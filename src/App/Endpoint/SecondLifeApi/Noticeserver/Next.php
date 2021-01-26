<?php

namespace App\Endpoint\SecondLifeApi\Noticeserver;

use App\Models\Apis;
use App\Models\Avatar;
use App\Models\Botconfig;
use App\Models\Notecard;
use App\Models\Notice;
use App\Models\Noticenotecard;
use App\Models\NoticeSet;
use App\Models\Package;
use App\Models\Rental;
use App\Models\RentalSet;
use App\Models\Server;
use App\Models\Stream;
use App\Template\SecondlifeAjax;
use bot_helper;
use swapables_helper;

class Next extends SecondlifeAjax
{
    public function process(): void
    {
        global $unixtime_hour;
        if ($this->owner_override == false) {
            $this->setSwapTag("message", "SystemAPI access only - please contact support");
            return;
        }

        $botconfig = new Botconfig();
        if ($botconfig->loadID(1) == false) {
            $this->setSwapTag("message", "Unable to load bot config");
            return;
        }

        if ($botconfig->getAvatarLink() <= 0) {
            $this->setSwapTag("message", "Assigned avatar to bot is not vaild");
            return;
        }

        $botavatar = new Avatar();
        if ($botavatar->loadID($botconfig->getAvatarLink()) == false) {
            $this->setSwapTag("message", "Unable to load avatar attached to bot");
            return;
        }

        $server = new Server();
        $apis = new Apis();
        $notice_set = new NoticeSet();
        $package = new Package();
        $stream = new Stream();
        $avatar = new Avatar();
        $rental_set = new RentalSet();

        $notice_set->loadAll();

        $rental_ids_expired = [];
        $status = true;
        $why_failed = "";
        $all_ok = true;
        $changes = 0;

        $sorted_linked = $notice_set->getLinkedArray("hoursRemaining", "id");
        ksort($sorted_linked, SORT_NUMERIC);
        $max_hours = array_keys($sorted_linked)[count($sorted_linked) - 2]; // ignore 999 hours at the end for active
        $unixtime = $max_hours * $unixtime_hour;
        $expired_notice = $notice_set->getObjectByField("hoursRemaining", 0);

        $where_config = [
            "fields" => ["expireUnixtime","noticeLink"],
            "values" => [(time() + $unixtime),$expired_notice->getId()],
            "types" => ["i","i"],
            "matches" => ["<=","!="],
        ];

        $rental_set->loadWithConfig($where_config);
        if ($rental_set->getCount() == 0) {
            $this->setSwapTag("status", true);
            $this->setSwapTag("message", "nowork");
            return;
        }

        $rental = $rental_set->getFirst();

        $avatar->loadID($rental->getAvatarLink());
        $stream->loadID($rental->getStreamLink());
        $server->loadID($stream->getServerLink());
        $package->loadID($stream->getPackageLink());
        $apis->loadID($server->getApiLink());

        if ($rental->getExpireUnixtime() < time()) {
            $this->processNoticeChange(
                $expired_notice,
                $rental,
                $package,
                $avatar,
                $stream,
                $server,
                $botconfig,
                $botavatar
            );
            return;
        }

        $hours_remain = ceil(($rental->getExpireUnixtime() - time()) / $unixtime_hour);
        if ($hours_remain < 0) {
            $this->setSwapTag("message", "Math error - negitive hours remaining but not expired");
            return;
        }

        $current_notice_level = $notice_set->getObjectByID($rental->getNoticeLink());
        $current_hold_hours = $current_notice_level->getHoursRemaining();
        $use_notice_index = 0;
        foreach ($sorted_linked as $hours => $index) {
            if (($hours > 0) && ($hours < 999)) {
                if ($hours > $hours_remain) {
                    if ($hours < $current_hold_hours) {
                        $use_notice_index = $index;
                    }
                    break;
                }
            }
        }

        if ($use_notice_index != 0) {
            if ($use_notice_index != $current_notice_level->getId()) {
                $notice = $notice_set->getObjectByID($use_notice_index);
                $this->processNoticeChange(
                    $notice,
                    $rental,
                    $package,
                    $avatar,
                    $stream,
                    $server,
                    $botconfig,
                    $botavatar
                );
                return;
            }
        }

        $this->setSwapTag(
            "message",
            "Error processing notice change - End of process found! expected nowork call!"
        );
    }

    protected function processNoticeChange(
        Notice $notice,
        Rental $rental,
        Package $package,
        Avatar $avatar,
        Stream $stream,
        Server $server,
        Botconfig $botconfig,
        Avatar $botavatar
    ): void {
        $bot_helper = new bot_helper();
        $swapables_helper = new swapables_helper();
        $sendmessage = $swapables_helper->get_swapped_text(
            $notice->getImMessage(),
            $avatar,
            $rental,
            $package,
            $server,
            $stream
        );
        $sendMessage_status = $bot_helper->sendMessage(
            $botconfig,
            $botavatar,
            $avatar,
            $sendmessage,
            $notice->getUseBot()
        );
        if ($sendMessage_status["status"] == false) {
            $this->setSwapTag("message", "Unable to put mail into outbox");
            return;
        }
        $rental->setNoticeLink($notice->getId());
        $save_status = $rental->updateEntry();
        if ($save_status["status"] == false) {
            $this->setSwapTag("message", "Unable to update rental notice level");
            return;
        }

        if ($notice->getHoursRemaining() == 0) {
            include "shared/media_server_apis/logic/expire.php";
            $all_ok = $api_serverlogic_reply;
        }

        if ($all_ok == false) {
            return;
        }

        if ($notice->getSendNotecard() == true) {
            if ($botconfig->getNotecards() == true) {
                $notecard = new Notecard();
                $notecard->setRentalLink($rental->getId());
                $notecard->setAsNotice(1);
                $notecard->setNoticeLink($notice->getId());
                $create_status = $notecard->createEntry();
                if ($create_status["status"] == false) {
                    $this->setSwapTag("message", "Unable to create new notecard");
                    return;
                }
            }
        }

        if ($notice->getNoticeNotecardLink() <= 1) {
            return;
        }
        $notice_notecard = new Noticenotecard();

        if ($notice_notecard->loadID($notice->getNoticeNotecardLink()) == false) {
            $this->setSwapTag("message", "Unable to find static notecard!");
            return;
        }
        if ($notice_notecardgetMissing() == false) {
            $this->setSwapTag("send_static_notecard", $notice_notecard->getName());
            $this->setSwapTag("send_static_notecard_to", $avatar->getAvatarUUID());
        }

        $this->setSwapTag("status", true);
    }
}
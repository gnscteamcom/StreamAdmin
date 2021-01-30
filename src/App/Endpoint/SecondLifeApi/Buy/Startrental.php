<?php

namespace App\Endpoint\SecondLifeApi\Buy;

use App\Helpers\AvatarHelper;
use App\Helpers\TransactionsHelper;
use App\MediaServer\Logic\ApiLogicBuy;
use App\MediaServer\Logic\Buy;
use App\R7\Set\ApirequestsSet;
use App\R7\Model\Avatar;
use App\R7\Model\Banlist;
use App\R7\Set\NoticeSet;
use App\R7\Model\Package;
use App\R7\Model\Region;
use App\R7\Model\Rental;
use App\R7\Model\Reseller;
use App\R7\Model\Stream;
use App\R7\Set\StreamSet;
use App\R7\Model\Transactions;
use App\Template\SecondlifeAjax;
use YAPF\InputFilter\InputFilter;

class Startrental extends SecondlifeAjax
{
    protected function notBanned(Avatar $avatar): bool
    {
        $banlist = new Banlist();
        $banlist->loadByField("avatarLink", $avatar->getId());
        if ($banlist->getId() > 0) {
            return false;
        }
        return true;
    }

    protected function getAvatar(string $avatarUUID, string $avatarName): ?Avatar
    {
        $avatar_helper = new AvatarHelper();
        $get_av_status = $avatar_helper->loadOrCreate($avatarUUID, $avatarName);
        if ($get_av_status == true) {
            return $avatar_helper->getAvatar();
        }
        return null;
    }

    protected function getPackage(string $packageuid): ?Package
    {
        $package = new Package();
        if ($package->loadByField("packageUid", $packageuid) == true) {
            return $package;
        }
        return null;
    }

    protected function getUnassignedStreamOnPackage(package $package): ?Stream
    {
        $apirequests_set = new ApirequestsSet();
        $apirequests_set->loadAll();
        $used_stream_ids = $apirequests_set->getUniqueArray("streamLink");
        $where_config = [
            "fields" => ["rentalLink","packageLink","needWork"],
            "values" => [null,$package->getId(),0],
            "types" => ["i","i","i"],
            "matches" => ["IS","=","="],
        ];
        if (count($used_stream_ids) > 0) {
            $whereconfig["fields"][] = "id";
            $whereconfig["matches"][] = "NOT IN";
            $whereconfig["values"][] = $used_stream_ids;
            $whereconfig["types"][] = "i";
        }
        $stream_set = new StreamSet();
        $stream_set->loadWithConfig($where_config);
        if ($stream_set->getCount() > 0) {
            $stream_id = $stream_set->getAllIds()[rand(0, $stream_set->getCount() - 1)];
            return $stream_set->getObjectByID($stream_id);
        }
        return null;
    }

    public function process(): void
    {
        global $unixtime_hour;
        $input = new InputFilter();
        $package = null;
        $stream = null;
        $avatar = null;
        $hours_remain = 0;
        $amountpaid = 0;
        $use_notice_index = 0;

        $package = $this->getPackage($input->postFilter("packageuid"));
        if ($package == null) { // find package
            $this->setSwapTag("message", "Unable to find");
            return;
        }

        $avatar = $this->getAvatar($input->postFilter("avatarUUID"), $input->postFilter("avatarName"));
        if ($avatar == null) {
            $this->setSwapTag("message", "Unable to attach avatar");
            return;
        }

        if ($this->notBanned($avatar) == false) {
            $this->setSwapTag("message", "Unable to attach avatar");
            return;
        }

        $stream = $this->getUnassignedStreamOnPackage($package);
        if ($stream == null) {
            $this->setSwapTag("message", "Unable to find a unsold stream in that package");
            return;
        }

        $amountpaid = $input->postFilter("amountpaid", "integer");
        $accepted_payment_amounts = [
            $package->getCost() => 1,
            ($package->getCost() * 2) => 2,
            ($package->getCost() * 3) => 3,
            ($package->getCost() * 4) => 4,
        ];
        if (array_key_exists($amountpaid, $accepted_payment_amounts) == false) {
            $this->setSwapTag("message", "Payment amount not accepted");
            return;
        }
        // get expire unixtime and notice index
        $notice_set = new NoticeSet();
        $notice_set->loadAll();
        $sorted_linked = $notice_set->getLinkedArray("hoursRemaining", "id");
        ksort($sorted_linked, SORT_NUMERIC);
        $multipler = $accepted_payment_amounts[$amountpaid];
        $hours_remain = ($package->getDays() * 24) * $multipler;
        $use_notice_index = 0;
        foreach ($sorted_linked as $hours => $index) {
            if ($hours > $hours_remain) {
                break;
            } else {
                $use_notice_index = $index;
            }
        }
        $unixtime = time() + ($hours_remain * $unixtime_hour);

        $rental = new Rental();
        $uid_rental = $rental->createUID("rentalUid", 8, 10);
        $status = $uid_rental["status"];
        if ($status == false) {
            $this->setSwapTag("message", "Unable to create rental uid");
            return;
        }

        $rental->setRentalUid($uid_rental["uid"]);
        $rental->setAvatarLink($avatar->getId());
        $rental->setPackageLink($stream->getPackageLink());
        $rental->setStreamLink($stream->getId());
        $rental->setStartUnixtime(time());
        $rental->setExpireUnixtime($unixtime);
        $rental->setNoticeLink($use_notice_index);
        $rental->setTotalAmount($amountpaid);
        $status = $rental->createEntry()["status"];
        if ($status == false) {
            $this->setSwapTag("message", "Unable to create rental");
            return;
        }

        $stream->setRentalLink($rental->getId());
        $status = $stream->updateEntry()["status"];
        if ($status == false) {
            $this->setSwapTag("message", "Unable to update rental link for stream");
            return;
        }

        $TransactionsHelper = new TransactionsHelper();

        $status = $TransactionsHelper->createTransaction(
            $avatar,
            $package,
            $stream,
            $this->reseller,
            $this->region,
            $amountpaid
        );
        if ($status == false) {
            $this->setSwapTag("message", "Unable to create transaction");
            return;
        }

        $this->setSwapTag("owner_payment", 0);
        if ($this->owner_override == false) {
            $avatar_system = new Avatar();
            if ($avatar_system->loadID($this->slconfig->getOwnerAvatarLink()) == false) {
                $this->setSwapTag("message", "Unable to load owner avatar");
                return;
            }
            $left_over = $amountpaid;
            if ($this->reseller->getRate() > 0) {
                $one_p = $amountpaid / 100;
                $reseller_cut = floor($one_p * $this->reseller->getRate());
                $left_over = $amountpaid - $reseller_cut;
                if ($reseller_cut < 1) {
                    if ($left_over >= 2) {
                        $left_over--;
                        $reseller_cut++;
                    }
                }
            }
            $this->setSwapTag("owner_payment", 1);
            $this->setSwapTag("owner_payment_amount", $left_over);
            $this->setSwapTag("owner_payment_uuid", $avatar_system->getAvatarUUID());
        }

        $this->setSwapTag("status", $status);

        $apilogic = new ApiLogicBuy();
        $reply = $apilogic->getApiServerLogicReply();
        if ($reply["status"] == false) {
            return;
        }
        if ($apilogic->getNoAction() == false) {
            return;
        }
        $status = createPendingApiRequest(
            null,
            $stream,
            $rental,
            "core_send_details",
            "Unable to create pending api request"
        );
    }
}

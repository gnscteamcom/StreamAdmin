<?php

namespace App\Endpoint\View\Home;

use App\Models\NoticeSet;
use App\Models\ObjectsSet;
use App\Models\RegionSet;
use App\Models\Rental;
use App\Models\ServerSet;
use App\Models\StreamSet;
use App\Template\Grid;

abstract class HomeLoadData extends View
{
    protected $client_expired = 0;
    protected $client_expires_soon = 0;
    protected $client_ok = 0;
    protected RegionSet $region_set;
    protected ObjectsSet $objects_set;
    protected ServerSet $server_set;
    protected $server_loads = [];
    protected $owner_objects_list = [];
    protected Grid $main_grid;
    protected $stream_total_sold = 0;
    protected $stream_total_ready = 0;
    protected $stream_total_needWork = 0;
    protected StreamSet $stream_set;

    protected function loadDatasets(): void
    {
        $this->loadServers();
        $this->loadServerLoads();
        $this->loadObjects();
        $this->loadNotices();
        $this->loadStreamStatus();
    }

    protected function loadServers(): void
    {
        $this->server_set = new ServerSet();
        $this->server_set->loadAll();
    }

    protected function loadStreamStatus(): void
    {
        $this->stream_set = new StreamSet();
        $this->stream_set->loadAll();
        foreach ($this->stream_set->getAllIds() as $stream_id) {
            $stream = $this->stream_set->getObjectByID($stream_id);
            $server = $this->server_set->getObjectByID($stream->getServerLink());
            if ($stream->getRentalLink() == null) {
                if ($stream->getNeedWork() == false) {
                    $this->stream_total_ready++;
                    $this->server_loads[$server->getId()]["ready"]++;
                } else {
                    $this->stream_total_needWork++;
                    $this->server_loads[$server->getId()]["needWork"]++;
                }
            } else {
                $this->stream_total_sold++;
                $this->server_loads[$server->getId()]["sold"]++;
            }
        }
    }

    protected function loadServerLoads(): void
    {
        $this->server_loads = [];
        foreach ($this->server_set->getAllIds() as $server_id) {
            $server = $this->server_set->getObjectByID($server_id);
            $this->server_loads[$server_id] = ["ready" => 0,"sold" => 0,"needWork" => 0];
        }
    }
    protected function loadObjects(): void
    {
        global $unixtime_hour;
        $this->owner_objects_list = [
        "apirequests",
        "mailserver",
        "noticeserver",
        "detailsserver",
        "notecardsserver",
        ];
        $one_hour_ago = (time() - $unixtime_hour);
        $this->objects_set = new ObjectsSet();
        $where_config = [
        "fields" => ["avatarLink","lastSeen","objectMode"],
        "matches" => ["=",">=","IN"],
        "values" => [$this->slconfig->getOwnerAvatarLink(),$one_hour_ago,$this->owner_objects_list],
        "types" => ["i","i","s"],
        ];
        $this->objects_set->loadWithConfig($where_config);
        $this->region_set = new RegionSet();
        $this->region_set->loadAll();
    }
    protected function loadNotices(): void
    {
        $notice_set = new NoticeSet();
        $notice_set->loadAll();
        $rental = new Rental();
        $group_count = $this->sql->groupCountV2($rental->getTable(), "noticeLink");
        if ($group_count["status"] == true) {
            foreach ($group_count["dataset"] as $key => $count) {
                $notice = $notice_set->getObjectByID($key);
                if ($notice->getHoursRemaining() <= 0) {
                    $this->client_expired += $count;
                } elseif ($notice->getHoursRemaining() > 24) {
                    $this->client_ok += $count;
                } else {
                    $this->client_expires_soon += $count;
                }
            }
        }
    }
}

<?php

namespace App\View\Client;

use App\Models\AvatarSet;
use App\Models\Notice;
use App\Models\RentalSet;
use App\Models\StreamSet;

class Bynoticelevel extends RenderList
{
    public function process(): void
    {
        $notice = new Notice();
        $notice->loadID($this->page);
        $this->rentalSet = new RentalSet();
        $this->rentalSet->loadByField("noticelink", $this->page);
        $this->avatarSet = new AvatarSet();
        $this->avatarSet->loadIds($this->rentalSet->getAllByField("avatarlink"));
        $this->streamSet = new StreamSet();
        $this->streamSet->loadIds($this->rentalSet->getAllByField("streamlink"));
        $this->output->addSwapTagString("page_title", " By notice level: " . $notice->getName());
        parent::process();
    }
}

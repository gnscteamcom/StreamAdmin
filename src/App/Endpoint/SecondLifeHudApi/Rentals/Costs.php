<?php

namespace App\Endpoint\SecondLifeHudApi\Rentals;

use App\R7\Model\Avatar;
use App\R7\Model\Package;
use App\R7\Model\Rental;
use App\Template\SecondlifeAjax;
use YAPF\InputFilter\InputFilter;

class Costs extends SecondlifeAjax
{
    public function process(): void
    {
        $input = new InputFilter();
        $rentalUid = $input->postFilter("uid");
        $rental = new Rental();
        $this->setSwapTag("message", "unabletoload");
        if ($rental->loadByField("rentalUid", $rentalUid) == false) {
            return;
        }
        if ($rental->getAvatarLink() != $this->object_ownerAvatarLinkatar->getId()) {
            return;
        }
        $package = new Package();
        if ($package->loadID($rental->getPackageLink()) == false) {
            return;
        }
        $avatar_system = new Avatar();
        if ($avatar_system->loadID($this->slconfig->getOwnerAvatarLink()) == false) {
            return;
        }
        $this->setSwapTag("status", true);
        $this->setSwapTag("message", "ok");
        $this->setSwapTag("systemowner", $avatar_system->getAvatarUUID());
        $this->setSwapTag("cost", $package->getCost());
        $this->setSwapTag("old_expire_time", $rental->getExpireUnixtime());
    }
}

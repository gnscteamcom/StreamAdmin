<?php

namespace App\View\Outbox;

use App\AvatarSet;
use App\DetailSet;
use App\RentalSet;

class Details extends View
{
    public function process(): void
    {
        $this->output->addSwapTagString("page_title", " Unsent details");
        $table_head = ["id","Rental UID","Avatar name"];
        $table_body = [];
        $detail_set = new DetailSet();
        $detail_set->loadAll();
        $rental_set = new RentalSet();
        $rental_set->loadIds($detail_set->getAllByField("rentallink"));
        $avatar_set = new AvatarSet();
        $avatar_set->loadIds($rental_set->getAllByField("avatarlink"));
        foreach ($detail_set->getAllIds() as $detail_id) {
            $detail = $detail_set->getObjectByID($detail_id);
            $rental = $rental_set->getObjectByID($detail->getRentallink());
            $avatar = $avatar_set->getObjectByID($rental->getAvatarlink());
            $table_body[] = [$detail->getId(),$rental->getRental_uid(),$avatar->getAvatarname()];
        }
        $this->output->setSwapTagString("page_content", render_datatable($table_head, $table_body));
    }
}
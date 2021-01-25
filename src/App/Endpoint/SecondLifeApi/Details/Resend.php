<?php

namespace App\Endpoint\SecondLifeApi\Details;

use App\Models\Detail;
use App\Models\Rental;
use App\Template\SecondlifeAjax;
use YAPF\InputFilter\InputFilter;

class Resend extends SecondlifeAjax
{
    public function process(): void
    {
        $input = new InputFilter();
        $rentalUid = $input->postFilter("rentalUid");
        $rental = new Rental();
        if ($rental->loadByField("rentalUid", $rentalUid) == true) {
            $this->setSwapTag("message", "Unable to find rental");
            return;
        }
        $detail = new Detail();
        $whereConfig = [
            "fields" => ["rentalLink"],
            "values" => [$rental->getId()],
            "types" => ["i"],
            "matches" => ["="],
        ];
        $count_data = $this->sql->basicCountV2($detail->getTable(), $whereConfig);
        if ($count_data["status"] == false) {
            $this->setSwapTag("message", "Unable to check if you have a pending details request");
            return;
        }
        if ($count_data["count"] != 0) {
            $this->setSwapTag("message", "You already have a pending details request please wait!");
            return;
        }
        $detail = new Detail();
        $detail->setRentalLink($rental->getId());
        $create_status = $detail->createEntry();
        if ($create_status["status"] == false) {
            $this->setSwapTag("message", "Unable to create details request");
            return;
        }
        $this->setSwapTag("status", true);
        $this->setSwapTag("message", "Details request accepted, it should be with you shortly!");
    }
}

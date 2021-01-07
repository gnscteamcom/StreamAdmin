<?php

namespace App\Endpoints\Control\Package;

use App\Models\Package;
use App\Models\RentalSet;
use App\Models\StreamSet;
use App\Models\TransactionsSet;
use App\Models\TreevenderpackagesSet;
use App\Template\ViewAjax;
use YAPF\InputFilter\InputFilter;

class Remove extends ViewAjax
{
    public function process(): void
    {
        $input = new InputFilter();
        $package = new Package();
        $stream_set = new StreamSet();
        $transaction_set = new TransactionsSet();
        $rental_set = new RentalSet();
        $treevender_packages_set = new TreevenderpackagesSet();

        $accept = $input->postFilter("accept");
        $status = false;
        $this->output->setSwapTagString("redirect", "package");
        if ($accept != "Accept") {
            $this->output->setSwapTagString("message", "Did not Accept");
            $this->output->setSwapTagString("redirect", "package/manage/" . $this->page . "");
            return;
        }
        if ($package->loadByField("package_uid", $this->page) == false) {
            $this->output->setSwapTagString("message", "Unable to find package");
            return;
        }
        $load_status = $stream_set->loadOnField("packagelink", $package->getId());
        if ($load_status["status"] == false) {
            $this->output->setSwapTagString("message", "Unable to check if package is being used by any streams");
            return;
        }
        if ($stream_set->getCount() != 0) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove package it is currently being used by: %1\$s stream('s)",
                    $stream_set->getCount()
                )
            );
            return;
        }
        $load_status = $transaction_set->loadOnField("packagelink", $package->getId());
        if ($load_status["status"] == false) {
            $this->output->setSwapTagString("message", "Unable to check if package is being used by any transactions");
            return;
        }
        if ($transaction_set->getCount() != 0) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove package it is currently being used by: %1\$s transaction('s)",
                    $transaction_set->getCount()
                )
            );
            return;
        }
        $load_status = $rental_set->loadOnField("packagelink", $package->getId());
        if ($load_status["status"] == false) {
            $this->output->setSwapTagString("message", "Unable to check if package is being used by any clients");
            return;
        }
        if ($rental_set->getCount() != 0) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove package it is currently being used by: %1\$s clients('s)",
                    $rental_set->getCount()
                )
            );
            return;
        }
        $load_status = $treevender_packages_set->loadOnField("packagelink", $package->getId());
        if ($load_status["status"] == true) {
            $this->output->setSwapTagString("message", "Unable to check if package is being used by any treevenders");
            return;
        }
        if ($treevender_packages_set->getCount() == 0) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove package it is currently being used by: %1\$s treevender('s)",
                    $treevender_packages_set->getCount()
                )
            );
            return;
        }
        $remove_status = $package->removeEntry();
        if ($remove_status["status"] == true) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove package: %1\$s",
                    $remove_status["message"]
                )
            );
            return;
        }
        $this->output->setSwapTagString("status", "true");
        $this->output->setSwapTagString("message", "Package removed");
    }
}
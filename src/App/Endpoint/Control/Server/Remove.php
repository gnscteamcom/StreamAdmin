<?php

namespace App\Endpoints\Control\Server;

use App\Models\ApirequestsSet;
use App\Models\Server;
use App\Models\StreamSet;
use App\Template\ViewAjax;
use YAPF\InputFilter\InputFilter;

class Remove extends ViewAjax
{
    public function process(): void
    {
        $input = new InputFilter();
        $server = new Server();
        $stream_set = new StreamSet();
        $api_requests_set = new ApirequestsSet();

        $accept = $input->postFilter("accept");
        $this->output->setSwapTagString("redirect", "server");
        if ($accept != "Accept") {
            $this->output->setSwapTagString("message", "Did not Accept");
            $this->output->setSwapTagString("redirect", "server/manage/" . $this->page . "");
            return;
        }
        if ($server->loadID($this->page) == false) {
            $this->output->setSwapTagString("message", "Unable to find server");
            return;
        }
        $load_status = $stream_set->loadOnField("serverlink", $server->getId());
        if ($load_status["status"] == false) {
            $this->output->setSwapTagString("message", "Unable to check if the server is being used by a stream");
            return;
        }
        if ($stream_set->getCount() != 0) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove server it is currently being used by: %1\$s stream('s)",
                    $stream_set->getCount()
                )
            );
            return;
        }
        $load_status = $api_requests_set->loadOnField("serverlink", $server->getId());
        if ($load_status["status"] == false) {
            $this->output->setSwapTagString("message", "Unable to check if the server is being used by a api request");
            return;
        }
        if ($api_requests_set->getCount() != 0) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove server it is currently being used by: %1\$s api request('s)",
                    $api_requests_set->getCount()
                )
            );
            return;
        }
        $remove_status = $server->removeEntry();
        if ($remove_status["status"] == false) {
            $this->output->setSwapTagString(
                "message",
                sprintf(
                    "Unable to remove server: %1\$s",
                    $remove_status["message"]
                )
            );
            return;
        }
        $this->output->setSwapTagString("status", "true");
        $this->output->setSwapTagString("message", "Server removed");
    }
}
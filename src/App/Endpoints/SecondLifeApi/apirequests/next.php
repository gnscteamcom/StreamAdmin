<?php

namespace App\Endpoints\SecondLifeApi\Apirequests;

use App\Models\ApirequestsSet;
use App\Template\SecondlifeAjax;

class Next extends SecondlifeAjax
{
    public function process(): void
    {
        if ($this->owner_override == false) {
            $this->output->setSwapTagString("message", "This API is owner only");
            return;
        }

        $order_config = ["ordering_enabled" => true,"order_field" => "last_attempt","order_dir" => "DESC"];
        $limits_config = ["page_number" => 0,"max_entrys" => 1];
        $api_requests_set = new ApirequestsSet();

        if ($api_requests_set->loadWithConfig(null, $order_config, $limits_config)["status"] == false) {
            $this->output->setSwapTagString("message", "Unable to load next api request");
            return;
        }
        if ($api_requests_set->getCount() == 0) {
            $this->output->setSwapTagString("message", "nowork");
            $this->output->setSwapTagString("status", "true");
            return;
        }

        $api_request = $api_requests_set->getFirst();
        $api_request->setAttempts($api_request->getAttempts() + 1);
        $api_request->setLast_attempt(time());
        $api_request->setMessage("started processing");
        $save_status = $api_request->updateEntry();
        if ($save_status["status"] == false) {
            $this->output->setSwapTagString("message", "Unable to mark event as processing Obj issue");
            return;
        }
        $targetclass = ucfirst($api_request->getEventname());
        $targetclass = str_replace("_", "", $targetclass);
        $namespace = "\\App\\Endpoints\\SecondLifeApi\\Apirequests\\Events\\";
        $use_class = $namespace . $targetclass;
        if (class_exists($use_class) == false) {
            $this->soft_fail = true;
            $this->output->setSwapTagString("message", "Unable to find event: " . $api_request->getEventname());
            return;
        }
        if ($this->sql->sqlSave(false) == false) {
            $this->output->setSwapTagString("message", "Unable to mark event as processing DB issue");
            return;
        }

        $obj = new $use_class();
        $obj->attachEvent($api_request);
        $obj->process();
        $obj->getoutput();
    }
}

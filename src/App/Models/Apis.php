<?php

namespace App;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Apis extends genClass
{
    protected $use_table = "apis";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "name" => ["type" => "str", "value" => null],
        "api_serverstatus" => ["type" => "bool", "value" => 0],
        "api_sync_accounts" => ["type" => "bool", "value" => 0],
        "opt_toggle_status" => ["type" => "bool", "value" => 0],
        "opt_password_reset" => ["type" => "bool", "value" => 0],
        "opt_autodj_next" => ["type" => "bool", "value" => 0],
        "opt_toggle_autodj" => ["type" => "bool", "value" => 0],
        "event_enable_start" => ["type" => "bool", "value" => 0],
        "event_start_sync_username" => ["type" => "bool", "value" => 0],
        "event_enable_renew" => ["type" => "bool", "value" => 0],
        "event_disable_expire" => ["type" => "bool", "value" => 0],
        "event_disable_revoke" => ["type" => "bool", "value" => 0],
        "event_revoke_reset_username" => ["type" => "bool", "value" => 0],
        "event_reset_password_revoke" => ["type" => "bool", "value" => 0],
        "event_clear_djs" => ["type" => "bool", "value" => 0],
        "event_recreate_revoke" => ["type" => "bool", "value" => 0],
        "event_create_stream" => ["type" => "bool", "value" => 0],
        "event_update_stream" => ["type" => "bool", "value" => 0],
    ];
    public function getName(): ?string
    {
        return $this->getField("name");
    }
    public function getApi_serverstatus(): ?bool
    {
        return $this->getField("api_serverstatus");
    }
    public function getApi_sync_accounts(): ?bool
    {
        return $this->getField("api_sync_accounts");
    }
    public function getOpt_toggle_status(): ?bool
    {
        return $this->getField("opt_toggle_status");
    }
    public function getOpt_password_reset(): ?bool
    {
        return $this->getField("opt_password_reset");
    }
    public function getOpt_autodj_next(): ?bool
    {
        return $this->getField("opt_autodj_next");
    }
    public function getOpt_toggle_autodj(): ?bool
    {
        return $this->getField("opt_toggle_autodj");
    }
    public function getEvent_enable_start(): ?bool
    {
        return $this->getField("event_enable_start");
    }
    public function getEvent_start_sync_username(): ?bool
    {
        return $this->getField("event_start_sync_username");
    }
    public function getEvent_enable_renew(): ?bool
    {
        return $this->getField("event_enable_renew");
    }
    public function getEvent_disable_expire(): ?bool
    {
        return $this->getField("event_disable_expire");
    }
    public function getEvent_disable_revoke(): ?bool
    {
        return $this->getField("event_disable_revoke");
    }
    public function getEvent_revoke_reset_username(): ?bool
    {
        return $this->getField("event_revoke_reset_username");
    }
    public function getEvent_reset_password_revoke(): ?bool
    {
        return $this->getField("event_reset_password_revoke");
    }
    public function getEvent_clear_djs(): ?bool
    {
        return $this->getField("event_clear_djs");
    }
    public function getEvent_recreate_revoke(): ?bool
    {
        return $this->getField("event_recreate_revoke");
    }
    public function getEvent_create_stream(): ?bool
    {
        return $this->getField("event_create_stream");
    }
    public function getEvent_update_stream(): ?bool
    {
        return $this->getField("event_update_stream");
    }
    /**
    * setName
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setName(?string $newvalue): array
    {
        return $this->updateField("name", $newvalue);
    }
    /**
    * setApi_serverstatus
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setApi_serverstatus(?bool $newvalue): array
    {
        return $this->updateField("api_serverstatus", $newvalue);
    }
    /**
    * setApi_sync_accounts
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setApi_sync_accounts(?bool $newvalue): array
    {
        return $this->updateField("api_sync_accounts", $newvalue);
    }
    /**
    * setOpt_toggle_status
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setOpt_toggle_status(?bool $newvalue): array
    {
        return $this->updateField("opt_toggle_status", $newvalue);
    }
    /**
    * setOpt_password_reset
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setOpt_password_reset(?bool $newvalue): array
    {
        return $this->updateField("opt_password_reset", $newvalue);
    }
    /**
    * setOpt_autodj_next
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setOpt_autodj_next(?bool $newvalue): array
    {
        return $this->updateField("opt_autodj_next", $newvalue);
    }
    /**
    * setOpt_toggle_autodj
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setOpt_toggle_autodj(?bool $newvalue): array
    {
        return $this->updateField("opt_toggle_autodj", $newvalue);
    }
    /**
    * setEvent_enable_start
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_enable_start(?bool $newvalue): array
    {
        return $this->updateField("event_enable_start", $newvalue);
    }
    /**
    * setEvent_start_sync_username
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_start_sync_username(?bool $newvalue): array
    {
        return $this->updateField("event_start_sync_username", $newvalue);
    }
    /**
    * setEvent_enable_renew
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_enable_renew(?bool $newvalue): array
    {
        return $this->updateField("event_enable_renew", $newvalue);
    }
    /**
    * setEvent_disable_expire
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_disable_expire(?bool $newvalue): array
    {
        return $this->updateField("event_disable_expire", $newvalue);
    }
    /**
    * setEvent_disable_revoke
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_disable_revoke(?bool $newvalue): array
    {
        return $this->updateField("event_disable_revoke", $newvalue);
    }
    /**
    * setEvent_revoke_reset_username
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_revoke_reset_username(?bool $newvalue): array
    {
        return $this->updateField("event_revoke_reset_username", $newvalue);
    }
    /**
    * setEvent_reset_password_revoke
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_reset_password_revoke(?bool $newvalue): array
    {
        return $this->updateField("event_reset_password_revoke", $newvalue);
    }
    /**
    * setEvent_clear_djs
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_clear_djs(?bool $newvalue): array
    {
        return $this->updateField("event_clear_djs", $newvalue);
    }
    /**
    * setEvent_recreate_revoke
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_recreate_revoke(?bool $newvalue): array
    {
        return $this->updateField("event_recreate_revoke", $newvalue);
    }
    /**
    * setEvent_create_stream
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_create_stream(?bool $newvalue): array
    {
        return $this->updateField("event_create_stream", $newvalue);
    }
    /**
    * setEvent_update_stream
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEvent_update_stream(?bool $newvalue): array
    {
        return $this->updateField("event_update_stream", $newvalue);
    }
}
// please do not edit this file
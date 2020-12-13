<?php

namespace App\Models;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Slconfig extends genClass
{
    protected $use_table = "slconfig";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "db_version" => ["type" => "str", "value" => 'install'],
        "new_resellers" => ["type" => "bool", "value" => 0],
        "new_resellers_rate" => ["type" => "int", "value" => 0],
        "sllinkcode" => ["type" => "str", "value" => null],
        "clients_list_mode" => ["type" => "bool", "value" => 0],
        "publiclinkcode" => ["type" => "str", "value" => null],
        "owner_av" => ["type" => "int", "value" => null],
        "eventstorage" => ["type" => "bool", "value" => 0],
        "datatable_itemsperpage" => ["type" => "int", "value" => 10],
        "http_inbound_secret" => ["type" => "str", "value" => null],
        "smtp_host" => ["type" => "str", "value" => null],
        "smtp_port" => ["type" => "int", "value" => null],
        "smtp_username" => ["type" => "str", "value" => null],
        "smtp_accesscode" => ["type" => "str", "value" => null],
        "smtp_from" => ["type" => "str", "value" => null],
        "smtp_replyto" => ["type" => "str", "value" => null],
        "displaytimezonelink" => ["type" => "int", "value" => 11],
        "api_default_email" => ["type" => "str", "value" => null],
    ];
    public function getDb_version(): ?string
    {
        return $this->getField("db_version");
    }
    public function getNew_resellers(): ?bool
    {
        return $this->getField("new_resellers");
    }
    public function getNew_resellers_rate(): ?int
    {
        return $this->getField("new_resellers_rate");
    }
    public function getSllinkcode(): ?string
    {
        return $this->getField("sllinkcode");
    }
    public function getClients_list_mode(): ?bool
    {
        return $this->getField("clients_list_mode");
    }
    public function getPubliclinkcode(): ?string
    {
        return $this->getField("publiclinkcode");
    }
    public function getOwner_av(): ?int
    {
        return $this->getField("owner_av");
    }
    public function getEventstorage(): ?bool
    {
        return $this->getField("eventstorage");
    }
    public function getDatatable_itemsperpage(): ?int
    {
        return $this->getField("datatable_itemsperpage");
    }
    public function getHttp_inbound_secret(): ?string
    {
        return $this->getField("http_inbound_secret");
    }
    public function getSmtp_host(): ?string
    {
        return $this->getField("smtp_host");
    }
    public function getSmtp_port(): ?int
    {
        return $this->getField("smtp_port");
    }
    public function getSmtp_username(): ?string
    {
        return $this->getField("smtp_username");
    }
    public function getSmtp_accesscode(): ?string
    {
        return $this->getField("smtp_accesscode");
    }
    public function getSmtp_from(): ?string
    {
        return $this->getField("smtp_from");
    }
    public function getSmtp_replyto(): ?string
    {
        return $this->getField("smtp_replyto");
    }
    public function getDisplaytimezonelink(): ?int
    {
        return $this->getField("displaytimezonelink");
    }
    public function getApi_default_email(): ?string
    {
        return $this->getField("api_default_email");
    }
    /**
    * setDb_version
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setDb_version(?string $newvalue): array
    {
        return $this->updateField("db_version", $newvalue);
    }
    /**
    * setNew_resellers
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setNew_resellers(?bool $newvalue): array
    {
        return $this->updateField("new_resellers", $newvalue);
    }
    /**
    * setNew_resellers_rate
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setNew_resellers_rate(?int $newvalue): array
    {
        return $this->updateField("new_resellers_rate", $newvalue);
    }
    /**
    * setSllinkcode
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSllinkcode(?string $newvalue): array
    {
        return $this->updateField("sllinkcode", $newvalue);
    }
    /**
    * setClients_list_mode
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setClients_list_mode(?bool $newvalue): array
    {
        return $this->updateField("clients_list_mode", $newvalue);
    }
    /**
    * setPubliclinkcode
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPubliclinkcode(?string $newvalue): array
    {
        return $this->updateField("publiclinkcode", $newvalue);
    }
    /**
    * setOwner_av
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setOwner_av(?int $newvalue): array
    {
        return $this->updateField("owner_av", $newvalue);
    }
    /**
    * setEventstorage
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEventstorage(?bool $newvalue): array
    {
        return $this->updateField("eventstorage", $newvalue);
    }
    /**
    * setDatatable_itemsperpage
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setDatatable_itemsperpage(?int $newvalue): array
    {
        return $this->updateField("datatable_itemsperpage", $newvalue);
    }
    /**
    * setHttp_inbound_secret
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setHttp_inbound_secret(?string $newvalue): array
    {
        return $this->updateField("http_inbound_secret", $newvalue);
    }
    /**
    * setSmtp_host
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSmtp_host(?string $newvalue): array
    {
        return $this->updateField("smtp_host", $newvalue);
    }
    /**
    * setSmtp_port
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSmtp_port(?int $newvalue): array
    {
        return $this->updateField("smtp_port", $newvalue);
    }
    /**
    * setSmtp_username
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSmtp_username(?string $newvalue): array
    {
        return $this->updateField("smtp_username", $newvalue);
    }
    /**
    * setSmtp_accesscode
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSmtp_accesscode(?string $newvalue): array
    {
        return $this->updateField("smtp_accesscode", $newvalue);
    }
    /**
    * setSmtp_from
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSmtp_from(?string $newvalue): array
    {
        return $this->updateField("smtp_from", $newvalue);
    }
    /**
    * setSmtp_replyto
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSmtp_replyto(?string $newvalue): array
    {
        return $this->updateField("smtp_replyto", $newvalue);
    }
    /**
    * setDisplaytimezonelink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setDisplaytimezonelink(?int $newvalue): array
    {
        return $this->updateField("displaytimezonelink", $newvalue);
    }
    /**
    * setApi_default_email
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setApi_default_email(?string $newvalue): array
    {
        return $this->updateField("api_default_email", $newvalue);
    }
}
// please do not edit this file

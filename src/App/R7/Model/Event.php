<?php

namespace App\R7\Model;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Event extends genClass
{
    protected $use_table = "event";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "avatarUUID" => ["type" => "str", "value" => null],
        "avatarName" => ["type" => "str", "value" => null],
        "rentalUid" => ["type" => "str", "value" => null],
        "packageUid" => ["type" => "str", "value" => null],
        "eventNew" => ["type" => "bool", "value" => 0],
        "eventRenew" => ["type" => "bool", "value" => 0],
        "eventExpire" => ["type" => "bool", "value" => 0],
        "eventRemove" => ["type" => "bool", "value" => 0],
        "unixtime" => ["type" => "int", "value" => null],
        "expireUnixtime" => ["type" => "int", "value" => null],
        "port" => ["type" => "int", "value" => 0],
    ];
    public function getAvatarUUID(): ?string
    {
        return $this->getField("avatarUUID");
    }
    public function getAvatarName(): ?string
    {
        return $this->getField("avatarName");
    }
    public function getRentalUid(): ?string
    {
        return $this->getField("rentalUid");
    }
    public function getPackageUid(): ?string
    {
        return $this->getField("packageUid");
    }
    public function getEventNew(): ?bool
    {
        return $this->getField("eventNew");
    }
    public function getEventRenew(): ?bool
    {
        return $this->getField("eventRenew");
    }
    public function getEventExpire(): ?bool
    {
        return $this->getField("eventExpire");
    }
    public function getEventRemove(): ?bool
    {
        return $this->getField("eventRemove");
    }
    public function getUnixtime(): ?int
    {
        return $this->getField("unixtime");
    }
    public function getExpireUnixtime(): ?int
    {
        return $this->getField("expireUnixtime");
    }
    public function getPort(): ?int
    {
        return $this->getField("port");
    }
    /**
    * setAvatarUUID
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setAvatarUUID(?string $newvalue): array
    {
        return $this->updateField("avatarUUID", $newvalue);
    }
    /**
    * setAvatarName
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setAvatarName(?string $newvalue): array
    {
        return $this->updateField("avatarName", $newvalue);
    }
    /**
    * setRentalUid
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setRentalUid(?string $newvalue): array
    {
        return $this->updateField("rentalUid", $newvalue);
    }
    /**
    * setPackageUid
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPackageUid(?string $newvalue): array
    {
        return $this->updateField("packageUid", $newvalue);
    }
    /**
    * setEventNew
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEventNew(?bool $newvalue): array
    {
        return $this->updateField("eventNew", $newvalue);
    }
    /**
    * setEventRenew
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEventRenew(?bool $newvalue): array
    {
        return $this->updateField("eventRenew", $newvalue);
    }
    /**
    * setEventExpire
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEventExpire(?bool $newvalue): array
    {
        return $this->updateField("eventExpire", $newvalue);
    }
    /**
    * setEventRemove
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEventRemove(?bool $newvalue): array
    {
        return $this->updateField("eventRemove", $newvalue);
    }
    /**
    * setUnixtime
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setUnixtime(?int $newvalue): array
    {
        return $this->updateField("unixtime", $newvalue);
    }
    /**
    * setExpireUnixtime
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setExpireUnixtime(?int $newvalue): array
    {
        return $this->updateField("expireUnixtime", $newvalue);
    }
    /**
    * setPort
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPort(?int $newvalue): array
    {
        return $this->updateField("port", $newvalue);
    }
}
// please do not edit this file
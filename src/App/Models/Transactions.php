<?php

namespace App\Models;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Transactions extends genClass
{
    protected $use_table = "transactions";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "avatarlink" => ["type" => "int", "value" => null],
        "packagelink" => ["type" => "int", "value" => null],
        "streamlink" => ["type" => "int", "value" => null],
        "resellerlink" => ["type" => "int", "value" => null],
        "regionlink" => ["type" => "int", "value" => null],
        "amount" => ["type" => "int", "value" => null],
        "unixtime" => ["type" => "int", "value" => null],
        "transaction_uid" => ["type" => "str", "value" => null],
        "renew" => ["type" => "bool", "value" => 0],
    ];
    public function getAvatarlink(): ?int
    {
        return $this->getField("avatarlink");
    }
    public function getPackagelink(): ?int
    {
        return $this->getField("packagelink");
    }
    public function getStreamlink(): ?int
    {
        return $this->getField("streamlink");
    }
    public function getResellerlink(): ?int
    {
        return $this->getField("resellerlink");
    }
    public function getRegionlink(): ?int
    {
        return $this->getField("regionlink");
    }
    public function getAmount(): ?int
    {
        return $this->getField("amount");
    }
    public function getUnixtime(): ?int
    {
        return $this->getField("unixtime");
    }
    public function getTransaction_uid(): ?string
    {
        return $this->getField("transaction_uid");
    }
    public function getRenew(): ?bool
    {
        return $this->getField("renew");
    }
    /**
    * setAvatarlink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setAvatarlink(?int $newvalue): array
    {
        return $this->updateField("avatarlink", $newvalue);
    }
    /**
    * setPackagelink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPackagelink(?int $newvalue): array
    {
        return $this->updateField("packagelink", $newvalue);
    }
    /**
    * setStreamlink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setStreamlink(?int $newvalue): array
    {
        return $this->updateField("streamlink", $newvalue);
    }
    /**
    * setResellerlink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setResellerlink(?int $newvalue): array
    {
        return $this->updateField("resellerlink", $newvalue);
    }
    /**
    * setRegionlink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setRegionlink(?int $newvalue): array
    {
        return $this->updateField("regionlink", $newvalue);
    }
    /**
    * setAmount
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setAmount(?int $newvalue): array
    {
        return $this->updateField("amount", $newvalue);
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
    * setTransaction_uid
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setTransaction_uid(?string $newvalue): array
    {
        return $this->updateField("transaction_uid", $newvalue);
    }
    /**
    * setRenew
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setRenew(?bool $newvalue): array
    {
        return $this->updateField("renew", $newvalue);
    }
}
// please do not edit this file

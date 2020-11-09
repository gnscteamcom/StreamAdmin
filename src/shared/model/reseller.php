<?php

namespace App;

use YAPF\DB_OBJECTS\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Reseller extends genClass
{
    protected $use_table = "reseller";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "avatarlink" => ["type" => "int", "value" => null],
        "allowed" => ["type" => "bool", "value" => 0],
        "rate" => ["type" => "int", "value" => 0],
    ];
    public function getAvatarlink(): ?int
    {
        return $this->getField("avatarlink");
    }
    public function getAllowed(): ?bool
    {
        return $this->getField("allowed");
    }
    public function getRate(): ?int
    {
        return $this->getField("rate");
    }
    public function setAvatarlink(?int $newvalue): array
    {
        return $this->updateField("avatarlink", $newvalue);
    }
    public function setAllowed(?bool $newvalue): array
    {
        return $this->updateField("allowed", $newvalue);
    }
    public function setRate(?int $newvalue): array
    {
        return $this->updateField("rate", $newvalue);
    }
}
// please do not edit this file
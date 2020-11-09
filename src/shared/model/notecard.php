<?php

namespace App;

use YAPF\DB_OBJECTS\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Notecard extends genClass
{
    protected $use_table = "notecard";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "rentallink" => ["type" => "int", "value" => null],
        "as_notice" => ["type" => "bool", "value" => 0],
        "noticelink" => ["type" => "int", "value" => null],
    ];
    public function getRentallink(): ?int
    {
        return $this->getField("rentallink");
    }
    public function getAs_notice(): ?bool
    {
        return $this->getField("as_notice");
    }
    public function getNoticelink(): ?int
    {
        return $this->getField("noticelink");
    }
    public function setRentallink(?int $newvalue): array
    {
        return $this->updateField("rentallink", $newvalue);
    }
    public function setAs_notice(?bool $newvalue): array
    {
        return $this->updateField("as_notice", $newvalue);
    }
    public function setNoticelink(?int $newvalue): array
    {
        return $this->updateField("noticelink", $newvalue);
    }
}
// please do not edit this file
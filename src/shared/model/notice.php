<?php

namespace App;

use YAPF\DB_OBJECTS\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Notice extends genClass
{
    protected $use_table = "notice";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "name" => ["type" => "str", "value" => null],
        "immessage" => ["type" => "str", "value" => null],
        "usebot" => ["type" => "bool", "value" => 0],
        "send_notecard" => ["type" => "bool", "value" => 0],
        "notecarddetail" => ["type" => "str", "value" => null],
        "hoursremaining" => ["type" => "int", "value" => 0],
        "notice_notecardlink" => ["type" => "int", "value" => 1],
    ];
    public function getName(): ?string
    {
        return $this->getField("name");
    }
    public function getImmessage(): ?string
    {
        return $this->getField("immessage");
    }
    public function getUsebot(): ?bool
    {
        return $this->getField("usebot");
    }
    public function getSend_notecard(): ?bool
    {
        return $this->getField("send_notecard");
    }
    public function getNotecarddetail(): ?string
    {
        return $this->getField("notecarddetail");
    }
    public function getHoursremaining(): ?int
    {
        return $this->getField("hoursremaining");
    }
    public function getNotice_notecardlink(): ?int
    {
        return $this->getField("notice_notecardlink");
    }
    public function setName(?string $newvalue): array
    {
        return $this->updateField("name", $newvalue);
    }
    public function setImmessage(?string $newvalue): array
    {
        return $this->updateField("immessage", $newvalue);
    }
    public function setUsebot(?bool $newvalue): array
    {
        return $this->updateField("usebot", $newvalue);
    }
    public function setSend_notecard(?bool $newvalue): array
    {
        return $this->updateField("send_notecard", $newvalue);
    }
    public function setNotecarddetail(?string $newvalue): array
    {
        return $this->updateField("notecarddetail", $newvalue);
    }
    public function setHoursremaining(?int $newvalue): array
    {
        return $this->updateField("hoursremaining", $newvalue);
    }
    public function setNotice_notecardlink(?int $newvalue): array
    {
        return $this->updateField("notice_notecardlink", $newvalue);
    }
}
// please do not edit this file
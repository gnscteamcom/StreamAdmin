<?php

namespace App;

use YAPF\DB_OBJECTS\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Rental extends genClass
{
    protected $use_table = "rental";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "avatarlink" => ["type" => "int", "value" => null],
        "streamlink" => ["type" => "int", "value" => null],
        "packagelink" => ["type" => "int", "value" => null],
        "noticelink" => ["type" => "int", "value" => null],
        "startunixtime" => ["type" => "int", "value" => null],
        "expireunixtime" => ["type" => "int", "value" => null],
        "renewals" => ["type" => "int", "value" => 0],
        "totalamount" => ["type" => "int", "value" => 0],
        "message" => ["type" => "str", "value" => null],
        "rental_uid" => ["type" => "str", "value" => null],
    ];
    public function getAvatarlink(): ?int
    {
        return $this->getField("avatarlink");
    }
    public function getStreamlink(): ?int
    {
        return $this->getField("streamlink");
    }
    public function getPackagelink(): ?int
    {
        return $this->getField("packagelink");
    }
    public function getNoticelink(): ?int
    {
        return $this->getField("noticelink");
    }
    public function getStartunixtime(): ?int
    {
        return $this->getField("startunixtime");
    }
    public function getExpireunixtime(): ?int
    {
        return $this->getField("expireunixtime");
    }
    public function getRenewals(): ?int
    {
        return $this->getField("renewals");
    }
    public function getTotalamount(): ?int
    {
        return $this->getField("totalamount");
    }
    public function getMessage(): ?string
    {
        return $this->getField("message");
    }
    public function getRental_uid(): ?string
    {
        return $this->getField("rental_uid");
    }
    public function setAvatarlink(?int $newvalue): array
    {
        return $this->updateField("avatarlink", $newvalue);
    }
    public function setStreamlink(?int $newvalue): array
    {
        return $this->updateField("streamlink", $newvalue);
    }
    public function setPackagelink(?int $newvalue): array
    {
        return $this->updateField("packagelink", $newvalue);
    }
    public function setNoticelink(?int $newvalue): array
    {
        return $this->updateField("noticelink", $newvalue);
    }
    public function setStartunixtime(?int $newvalue): array
    {
        return $this->updateField("startunixtime", $newvalue);
    }
    public function setExpireunixtime(?int $newvalue): array
    {
        return $this->updateField("expireunixtime", $newvalue);
    }
    public function setRenewals(?int $newvalue): array
    {
        return $this->updateField("renewals", $newvalue);
    }
    public function setTotalamount(?int $newvalue): array
    {
        return $this->updateField("totalamount", $newvalue);
    }
    public function setMessage(?string $newvalue): array
    {
        return $this->updateField("message", $newvalue);
    }
    public function setRental_uid(?string $newvalue): array
    {
        return $this->updateField("rental_uid", $newvalue);
    }
}
// please do not edit this file

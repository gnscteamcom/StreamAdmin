<?php

namespace App\R7\Model;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Banlist extends genClass
{
    protected $use_table = "banlist";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "avatarLink" => ["type" => "int", "value" => null],
    ];
    public function getAvatarLink(): ?int
    {
        return $this->getField("avatarLink");
    }
    /**
    * setAvatarLink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setAvatarLink(?int $newvalue): array
    {
        return $this->updateField("avatarLink", $newvalue);
    }
}
// please do not edit this file
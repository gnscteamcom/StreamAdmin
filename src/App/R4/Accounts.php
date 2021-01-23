<?php

namespace App\R4;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Accounts extends genClass
{
    protected $use_table = "accounts";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "username" => ["type" => "str", "value" => null],
        "password" => ["type" => "str", "value" => null],
        "mhash" => ["type" => "str", "value" => null],
    ];
    public function getUsername(): ?string
    {
        return $this->getField("username");
    }
    public function getPassword(): ?string
    {
        return $this->getField("password");
    }
    public function getMhash(): ?string
    {
        return $this->getField("mhash");
    }
    /**
    * setUsername
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setUsername(?string $newvalue): array
    {
        return $this->updateField("username", $newvalue);
    }
    /**
    * setPassword
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPassword(?string $newvalue): array
    {
        return $this->updateField("password", $newvalue);
    }
    /**
    * setMhash
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setMhash(?string $newvalue): array
    {
        return $this->updateField("mhash", $newvalue);
    }
}
// please do not edit this file

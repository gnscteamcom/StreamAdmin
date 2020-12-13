<?php

namespace App\Models;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Staff extends genClass
{
    protected $use_table = "staff";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "username" => ["type" => "str", "value" => null],
        "email" => ["type" => "str", "value" => null],
        "email_reset_code" => ["type" => "str", "value" => null],
        "email_reset_expires" => ["type" => "int", "value" => 0],
        "avatarlink" => ["type" => "int", "value" => null],
        "phash" => ["type" => "str", "value" => null],
        "lhash" => ["type" => "str", "value" => null],
        "psalt" => ["type" => "str", "value" => null],
        "ownerlevel" => ["type" => "bool", "value" => 0],
    ];
    public function getUsername(): ?string
    {
        return $this->getField("username");
    }
    public function getEmail(): ?string
    {
        return $this->getField("email");
    }
    public function getEmail_reset_code(): ?string
    {
        return $this->getField("email_reset_code");
    }
    public function getEmail_reset_expires(): ?int
    {
        return $this->getField("email_reset_expires");
    }
    public function getAvatarlink(): ?int
    {
        return $this->getField("avatarlink");
    }
    public function getPhash(): ?string
    {
        return $this->getField("phash");
    }
    public function getLhash(): ?string
    {
        return $this->getField("lhash");
    }
    public function getPsalt(): ?string
    {
        return $this->getField("psalt");
    }
    public function getOwnerlevel(): ?bool
    {
        return $this->getField("ownerlevel");
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
    * setEmail
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEmail(?string $newvalue): array
    {
        return $this->updateField("email", $newvalue);
    }
    /**
    * setEmail_reset_code
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEmail_reset_code(?string $newvalue): array
    {
        return $this->updateField("email_reset_code", $newvalue);
    }
    /**
    * setEmail_reset_expires
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setEmail_reset_expires(?int $newvalue): array
    {
        return $this->updateField("email_reset_expires", $newvalue);
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
    * setPhash
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPhash(?string $newvalue): array
    {
        return $this->updateField("phash", $newvalue);
    }
    /**
    * setLhash
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setLhash(?string $newvalue): array
    {
        return $this->updateField("lhash", $newvalue);
    }
    /**
    * setPsalt
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPsalt(?string $newvalue): array
    {
        return $this->updateField("psalt", $newvalue);
    }
    /**
    * setOwnerlevel
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setOwnerlevel(?bool $newvalue): array
    {
        return $this->updateField("ownerlevel", $newvalue);
    }
}
// please do not edit this file

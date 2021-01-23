<?php

namespace App\R4;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Reminder extends genClass
{
    protected $use_table = "reminder";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "SLkey" => ["type" => "str", "value" => null],
        "SLname" => ["type" => "str", "value" => null],
        "SLunixtime" => ["type" => "str", "value" => null],
    ];
    public function getSLkey(): ?string
    {
        return $this->getField("SLkey");
    }
    public function getSLname(): ?string
    {
        return $this->getField("SLname");
    }
    public function getSLunixtime(): ?string
    {
        return $this->getField("SLunixtime");
    }
    /**
    * setSLkey
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSLkey(?string $newvalue): array
    {
        return $this->updateField("SLkey", $newvalue);
    }
    /**
    * setSLname
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSLname(?string $newvalue): array
    {
        return $this->updateField("SLname", $newvalue);
    }
    /**
    * setSLunixtime
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setSLunixtime(?string $newvalue): array
    {
        return $this->updateField("SLunixtime", $newvalue);
    }
}
// please do not edit this file

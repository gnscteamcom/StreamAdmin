<?php

namespace App;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Treevenderpackages extends genClass
{
    protected $use_table = "treevenderpackages";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "treevenderlink" => ["type" => "int", "value" => null],
        "packagelink" => ["type" => "int", "value" => null],
    ];
    public function getTreevenderlink(): ?int
    {
        return $this->getField("treevenderlink");
    }
    public function getPackagelink(): ?int
    {
        return $this->getField("packagelink");
    }
    /**
    * setTreevenderlink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setTreevenderlink(?int $newvalue): array
    {
        return $this->updateField("treevenderlink", $newvalue);
    }
    /**
    * setPackagelink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPackagelink(?int $newvalue): array
    {
        return $this->updateField("packagelink", $newvalue);
    }
}
// please do not edit this file
<?php

namespace App;

use YAPF\DB_OBJECTS\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Region extends genClass
{
    protected $use_table = "region";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "name" => ["type" => "str", "value" => null],
    ];
    public function getName(): ?string
    {
        return $this->getField("name");
    }
    public function setName(?string $newvalue): array
    {
        return $this->updateField("name", $newvalue);
    }
}
// please do not edit this file
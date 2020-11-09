<?php

namespace App;

use YAPF\DB_OBJECTS\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Detail extends genClass
{
    protected $use_table = "detail";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "rentallink" => ["type" => "int", "value" => null],
    ];
    public function getRentallink(): ?int
    {
        return $this->getField("rentallink");
    }
    public function setRentallink(?int $newvalue): array
    {
        return $this->updateField("rentallink", $newvalue);
    }
}
// please do not edit this file
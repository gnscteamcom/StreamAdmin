<?php

namespace App;

use YAPF\DbObjects\GenClass\GenClass as GenClass;

// Do not edit this file, rerun gen.php to update!
class Package extends genClass
{
    protected $use_table = "package";
    protected $dataset = [
        "id" => ["type" => "int", "value" => null],
        "package_uid" => ["type" => "str", "value" => null],
        "name" => ["type" => "str", "value" => null],
        "autodj" => ["type" => "bool", "value" => 0],
        "autodj_size" => ["type" => "str", "value" => null],
        "listeners" => ["type" => "int", "value" => null],
        "bitrate" => ["type" => "int", "value" => null],
        "templatelink" => ["type" => "int", "value" => null],
        "servertypelink" => ["type" => "int", "value" => 1],
        "cost" => ["type" => "int", "value" => null],
        "days" => ["type" => "int", "value" => null],
        "texture_uuid_soldout" => ["type" => "str", "value" => null],
        "texture_uuid_instock_small" => ["type" => "str", "value" => null],
        "texture_uuid_instock_selected" => ["type" => "str", "value" => null],
        "api_template" => ["type" => "str", "value" => null],
    ];
    public function getPackage_uid(): ?string
    {
        return $this->getField("package_uid");
    }
    public function getName(): ?string
    {
        return $this->getField("name");
    }
    public function getAutodj(): ?bool
    {
        return $this->getField("autodj");
    }
    public function getAutodj_size(): ?string
    {
        return $this->getField("autodj_size");
    }
    public function getListeners(): ?int
    {
        return $this->getField("listeners");
    }
    public function getBitrate(): ?int
    {
        return $this->getField("bitrate");
    }
    public function getTemplatelink(): ?int
    {
        return $this->getField("templatelink");
    }
    public function getServertypelink(): ?int
    {
        return $this->getField("servertypelink");
    }
    public function getCost(): ?int
    {
        return $this->getField("cost");
    }
    public function getDays(): ?int
    {
        return $this->getField("days");
    }
    public function getTexture_uuid_soldout(): ?string
    {
        return $this->getField("texture_uuid_soldout");
    }
    public function getTexture_uuid_instock_small(): ?string
    {
        return $this->getField("texture_uuid_instock_small");
    }
    public function getTexture_uuid_instock_selected(): ?string
    {
        return $this->getField("texture_uuid_instock_selected");
    }
    public function getApi_template(): ?string
    {
        return $this->getField("api_template");
    }
    /**
    * setPackage_uid
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setPackage_uid(?string $newvalue): array
    {
        return $this->updateField("package_uid", $newvalue);
    }
    /**
    * setName
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setName(?string $newvalue): array
    {
        return $this->updateField("name", $newvalue);
    }
    /**
    * setAutodj
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setAutodj(?bool $newvalue): array
    {
        return $this->updateField("autodj", $newvalue);
    }
    /**
    * setAutodj_size
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setAutodj_size(?string $newvalue): array
    {
        return $this->updateField("autodj_size", $newvalue);
    }
    /**
    * setListeners
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setListeners(?int $newvalue): array
    {
        return $this->updateField("listeners", $newvalue);
    }
    /**
    * setBitrate
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setBitrate(?int $newvalue): array
    {
        return $this->updateField("bitrate", $newvalue);
    }
    /**
    * setTemplatelink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setTemplatelink(?int $newvalue): array
    {
        return $this->updateField("templatelink", $newvalue);
    }
    /**
    * setServertypelink
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setServertypelink(?int $newvalue): array
    {
        return $this->updateField("servertypelink", $newvalue);
    }
    /**
    * setCost
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setCost(?int $newvalue): array
    {
        return $this->updateField("cost", $newvalue);
    }
    /**
    * setDays
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setDays(?int $newvalue): array
    {
        return $this->updateField("days", $newvalue);
    }
    /**
    * setTexture_uuid_soldout
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setTexture_uuid_soldout(?string $newvalue): array
    {
        return $this->updateField("texture_uuid_soldout", $newvalue);
    }
    /**
    * setTexture_uuid_instock_small
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setTexture_uuid_instock_small(?string $newvalue): array
    {
        return $this->updateField("texture_uuid_instock_small", $newvalue);
    }
    /**
    * setTexture_uuid_instock_selected
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setTexture_uuid_instock_selected(?string $newvalue): array
    {
        return $this->updateField("texture_uuid_instock_selected", $newvalue);
    }
    /**
    * setApi_template
    * @return mixed[] [status =>  bool, message =>  string]
    */
    public function setApi_template(?string $newvalue): array
    {
        return $this->updateField("api_template", $newvalue);
    }
}
// please do not edit this file
<?php

namespace App\R4;

use YAPF\DbObjects\CollectionSet\CollectionSet as CollectionSet;

// Do not edit this file, rerun gen.php to update!
class ItemsSet extends CollectionSet
{
    /**
     * getObjectByID
     * returns a object that matchs the selected id
     * returns null if not found
     * Note: Does not support bad Ids please use findObjectByField
     */
    public function getObjectByID($id): ?Items
    {
        return parent::getObjectByID($id);
    }
    /**
     * getFirst
     * returns the first object in a collection
     */
    public function getFirst(): ?Items
    {
        return parent::getFirst();
    }
}

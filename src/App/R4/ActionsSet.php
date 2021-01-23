<?php

namespace App\R4;

use YAPF\DbObjects\CollectionSet\CollectionSet as CollectionSet;

// Do not edit this file, rerun gen.php to update!
class ActionsSet extends CollectionSet
{
    /**
     * getObjectByID
     * returns a object that matchs the selected id
     * returns null if not found
     * Note: Does not support bad Ids please use findObjectByField
     */
    public function getObjectByID($id): ?Actions
    {
        return parent::getObjectByID($id);
    }
    /**
     * getFirst
     * returns the first object in a collection
     */
    public function getFirst(): ?Actions
    {
        return parent::getFirst();
    }
}

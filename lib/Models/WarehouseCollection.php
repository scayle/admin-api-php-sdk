<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Warehouse[] $entities
 */
class WarehouseCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Warehouse::class,
    ];

    /**
     * @return Warehouse[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Warehouse[] $entities
 */
class WarehouseCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Warehouse::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Warehouse[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

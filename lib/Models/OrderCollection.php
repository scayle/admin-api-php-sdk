<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Order[] $entities
 */
class OrderCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\Order::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Order[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

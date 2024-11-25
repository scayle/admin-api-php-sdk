<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Order[] $entities
 */
class OrderCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Order::class,
    ];

    /**
     * @return Order[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

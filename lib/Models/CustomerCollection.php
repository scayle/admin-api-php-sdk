<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Customer[] $entities
 */
class CustomerCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Customer::class,
    ];

    /**
     * @return Customer[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

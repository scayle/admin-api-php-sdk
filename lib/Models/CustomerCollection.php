<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Customer[] $entities
 */
class CustomerCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Customer::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Customer[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

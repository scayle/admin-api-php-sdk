<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\CustomerAddress[] $entities
 */
class CustomerAddressCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => CustomerAddress::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

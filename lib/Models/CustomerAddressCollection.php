<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\CustomerAddress[] $entities
 */
class CustomerAddressCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property CustomerAddress[] $entities
 */
class CustomerAddressCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => CustomerAddress::class,
    ];

    /**
     * @return CustomerAddress[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

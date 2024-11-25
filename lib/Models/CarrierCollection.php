<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Carrier[] $entities
 */
class CarrierCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Carrier::class,
    ];

    /**
     * @return Carrier[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

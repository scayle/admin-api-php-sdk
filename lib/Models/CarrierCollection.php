<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Carrier[] $entities
 */
class CarrierCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Carrier::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Carrier[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

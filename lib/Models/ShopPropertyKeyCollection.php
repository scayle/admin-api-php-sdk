<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey[] $entities
 */
class ShopPropertyKeyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

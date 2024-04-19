<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey[] $entities
 */
class ShopCategoryPropertyKeyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCategoryPropertyKey::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

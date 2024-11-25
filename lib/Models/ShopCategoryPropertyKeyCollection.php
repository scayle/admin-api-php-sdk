<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ShopCategoryPropertyKey[] $entities
 */
class ShopCategoryPropertyKeyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCategoryPropertyKey::class,
    ];

    /**
     * @return ShopCategoryPropertyKey[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

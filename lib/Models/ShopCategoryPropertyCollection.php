<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ShopCategoryProperty[] $entities
 */
class ShopCategoryPropertyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCategoryProperty::class,
    ];

    /**
     * @return ShopCategoryProperty[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

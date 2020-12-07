<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty[] $entities
 */
class ShopCategoryPropertyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

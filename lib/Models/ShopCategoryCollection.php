<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ShopCategory[] $entities
 */
class ShopCategoryCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCategory::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategory[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

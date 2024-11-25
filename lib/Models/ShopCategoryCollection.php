<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ShopCategory[] $entities
 */
class ShopCategoryCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCategory::class,
    ];

    /**
     * @return ShopCategory[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

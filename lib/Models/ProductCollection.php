<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Product[] $entities
 */
class ProductCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Product::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Product[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

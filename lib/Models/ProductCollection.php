<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Product[] $entities
 */
class ProductCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Product::class,
    ];

    /**
     * @return Product[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ProductImage[] $entities
 */
class ProductImageCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ProductImage::class,
    ];

    /**
     * @return ProductImage[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

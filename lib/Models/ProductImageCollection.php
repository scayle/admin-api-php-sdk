<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ProductImage[] $entities
 */
class ProductImageCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ProductImage::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ProductImage[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ProductVariant[] $entities
 */
class ProductVariantCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ProductVariant::class,
    ];

    /**
     * @return ProductVariant[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ProductVariant[] $entities
 */
class ProductVariantCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ProductVariant::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariant[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

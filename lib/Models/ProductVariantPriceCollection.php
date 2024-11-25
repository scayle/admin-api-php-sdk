<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ProductVariantPrice[] $entities
 */
class ProductVariantPriceCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ProductVariantPrice::class,
    ];

    /**
     * @return ProductVariantPrice[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

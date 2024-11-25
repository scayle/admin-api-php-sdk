<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ProductVariantStock[] $entities
 */
class ProductVariantStockCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ProductVariantStock::class,
    ];

    /**
     * @return ProductVariantStock[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

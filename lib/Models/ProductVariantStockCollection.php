<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ProductVariantStock[] $entities
 */
class ProductVariantStockCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\ProductVariantStock::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantStock[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

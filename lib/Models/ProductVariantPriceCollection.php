<?php

namespace AboutYou\Cloud\AdminApi\Models;

class ProductVariantPriceCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

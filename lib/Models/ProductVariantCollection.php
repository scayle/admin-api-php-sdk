<?php

namespace AboutYou\Cloud\AdminApi\Models;

class ProductVariantCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\ProductVariant::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariant[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

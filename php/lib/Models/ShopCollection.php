<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Shop[] $entities
 */
class ShopCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\Shop::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Shop[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

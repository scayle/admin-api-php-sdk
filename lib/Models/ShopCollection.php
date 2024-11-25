<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Shop[] $entities
 */
class ShopCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Shop::class,
    ];

    /**
     * @return Shop[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

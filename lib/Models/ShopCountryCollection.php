<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ShopCountry[] $entities
 */
class ShopCountryCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCountry::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCountry[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

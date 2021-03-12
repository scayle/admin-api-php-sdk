<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ShopCountry[] $entities
 */
class ShopCountryCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\ShopCountry::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCountry[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

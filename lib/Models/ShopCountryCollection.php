<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ShopCountry[] $entities
 */
class ShopCountryCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCountry::class,
    ];

    /**
     * @return ShopCountry[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

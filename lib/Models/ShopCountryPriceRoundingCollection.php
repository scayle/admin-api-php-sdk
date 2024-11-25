<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ShopCountryPriceRounding[] $entities
 */
class ShopCountryPriceRoundingCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCountryPriceRounding::class,
    ];

    /**
     * @return ShopCountryPriceRounding[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

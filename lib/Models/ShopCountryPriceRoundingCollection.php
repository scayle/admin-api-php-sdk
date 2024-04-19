<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRounding[] $entities
 */
class ShopCountryPriceRoundingCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ShopCountryPriceRounding::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRounding[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Merchant[] $entities
 */
class MerchantCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Merchant::class,
    ];

    /**
     * @return Merchant[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

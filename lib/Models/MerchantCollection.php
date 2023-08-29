<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Merchant[] $entities
 */
class MerchantCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\Merchant::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Merchant[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

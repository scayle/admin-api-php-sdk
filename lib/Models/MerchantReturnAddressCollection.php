<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress[] $entities
 */
class MerchantReturnAddressCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => MerchantReturnAddress::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

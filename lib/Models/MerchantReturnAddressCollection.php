<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property MerchantReturnAddress[] $entities
 */
class MerchantReturnAddressCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => MerchantReturnAddress::class,
    ];

    /**
     * @return MerchantReturnAddress[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

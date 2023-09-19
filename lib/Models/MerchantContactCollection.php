<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\MerchantContact[] $entities
 */
class MerchantContactCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\MerchantContact::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantContact[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

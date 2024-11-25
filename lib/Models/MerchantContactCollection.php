<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property MerchantContact[] $entities
 */
class MerchantContactCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => MerchantContact::class,
    ];

    /**
     * @return MerchantContact[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

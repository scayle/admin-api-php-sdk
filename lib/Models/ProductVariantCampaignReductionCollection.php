<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ProductVariantCampaignReduction[] $entities
 */
class ProductVariantCampaignReductionCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => ProductVariantCampaignReduction::class,
    ];

    /**
     * @return ProductVariantCampaignReduction[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

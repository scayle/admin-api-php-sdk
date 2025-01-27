<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property PromotionCode[] $entities
 */
class PromotionCodeCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => PromotionCode::class,
    ];

    /**
     * @return PromotionCode[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

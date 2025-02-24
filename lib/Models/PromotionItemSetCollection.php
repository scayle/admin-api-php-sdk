<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property PromotionItemSet[] $entities
 */
class PromotionItemSetCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => PromotionItemSet::class,
    ];

    /**
     * @return PromotionItemSet[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

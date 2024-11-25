<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Promotion[] $entities
 */
class PromotionCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Promotion::class,
    ];

    /**
     * @return Promotion[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

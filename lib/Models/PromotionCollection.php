<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Promotion[] $entities
 */
class PromotionCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Promotion::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Promotion[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

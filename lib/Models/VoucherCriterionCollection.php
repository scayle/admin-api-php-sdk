<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property VoucherCriterion[] $entities
 */
class VoucherCriterionCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => VoucherCriterion::class,
    ];

    /**
     * @return VoucherCriterion[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

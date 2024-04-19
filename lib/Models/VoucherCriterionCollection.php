<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\VoucherCriterion[] $entities
 */
class VoucherCriterionCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => VoucherCriterion::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\VoucherCriterion[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

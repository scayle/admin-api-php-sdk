<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Voucher[] $entities
 */
class VoucherCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Voucher::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Voucher[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

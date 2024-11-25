<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Voucher[] $entities
 */
class VoucherCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Voucher::class,
    ];

    /**
     * @return Voucher[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

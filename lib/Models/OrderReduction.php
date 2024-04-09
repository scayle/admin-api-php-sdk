<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderReductionAmount $amount
 * @property string $category
 * @property string $type
 * @property string $code Promotion or voucher code (for promotion / voucher reductions)
 * @property string $displayName Display name (for promotion reduction)
 */
class OrderReduction extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'amount' => \AboutYou\Cloud\AdminApi\Models\OrderReductionAmount::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

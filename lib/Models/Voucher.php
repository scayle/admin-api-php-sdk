<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $code
 * @property VoucherConstraints $constraints
 * @property string $name
 * @property string $status one of: active, inactive, pending-review, archived
 * @property string $summary
 * @property string $type
 * @property float $value
 */
class Voucher extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'constraints' => \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $code
 * @property VoucherConstraints $constraints
 * @property VoucherCriterion[] $criteria
 * @property bool $isApplicableToPromotions
 * @property string $name
 * @property string $status
 * @property string $summary
 * @property string $type
 * @property float $value
 */
class Voucher extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'constraints' => VoucherConstraints::class,
    ];

    protected $collectionClassMap = [
        'criteria' => VoucherCriterion::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

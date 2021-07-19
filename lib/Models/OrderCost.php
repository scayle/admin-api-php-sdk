<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderFee[] $appliedFees
 * @property OrderReduction[] $appliedReductions
 * @property OrderCostTax $tax
 * @property int $withTax
 * @property int $withoutTax
 */
class OrderCost extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'tax' => \AboutYou\Cloud\AdminApi\Models\OrderCostTax::class,
    ];

    protected $collectionClassMap = [
        'appliedFees' => \AboutYou\Cloud\AdminApi\Models\OrderFee::class,
        'appliedReductions' => \AboutYou\Cloud\AdminApi\Models\OrderReduction::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

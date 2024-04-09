<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderReduction[] $appliedReductions
 * @property OrderItemPriceReference $reference
 * @property OrderTax $tax
 * @property int $withTax
 * @property int $withoutTax
 * @property int $overrideWithoutTax
 * @property int $overrideWithTax
 * @property int $undiscountedWithOutTax Undiscounted item price **excluding** taxes
 * @property int $undiscountedWithTax Undiscounted item price **including** taxes
 */
class OrderItemPrice extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'tax' => \AboutYou\Cloud\AdminApi\Models\OrderTax::class,
        'reference' => \AboutYou\Cloud\AdminApi\Models\OrderItemPriceReference::class,
    ];

    protected $collectionClassMap = [
        'appliedReductions' => \AboutYou\Cloud\AdminApi\Models\OrderReduction::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

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
        'tax' => OrderTax::class,
        'reference' => OrderItemPriceReference::class,
    ];

    protected $collectionClassMap = [
        'appliedReductions' => OrderReduction::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

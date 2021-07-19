<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderReduction[] $appliedReductions
 * @property OrderItemPriceReference $reference
 * @property OrderTax $tax
 * @property int $withTax
 * @property int $withoutTax
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

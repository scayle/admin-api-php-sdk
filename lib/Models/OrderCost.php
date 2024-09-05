<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderFee[] $appliedFees
 * @property OrderReduction[] $appliedReductions
 * @property OrderCostTax $tax
 * @property int $withTax The price is calculated including taxes and all applicable reductions such as discounts for sale and campaigns (should a campaign key be provdided on the request).
 * @property int $withoutTax This price excludes taxes, but also includes all applicable reductions.
 * @property int $withTaxWithMembershipDiscountWithoutServiceCosts The price is calculated including taxes and all applicable reductions such as discounts for sale and campaigns (should a campaign key be provdided on the request), and membership discount.
 * @property int $withoutTaxWithMembershipDiscount This price excludes taxes, but also includes all applicable reductions and membership discount.
 * @property int $costCapture The exact cost captured: order total value - giftcard value - total membership discount
 * @property mixed $itemGroups
 */
class OrderCost extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'tax' => OrderCostTax::class,
    ];

    protected $collectionClassMap = [
        'appliedFees' => OrderFee::class,
        'appliedReductions' => OrderReduction::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

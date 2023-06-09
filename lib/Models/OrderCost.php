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

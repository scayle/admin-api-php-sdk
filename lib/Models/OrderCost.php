<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property OrderFee[] $appliedFees
 * @property OrderReduction[] $appliedReductions If the order has an external price, this field will not be included in the response payload.
 * @property OrderTax $tax
 * @property int $withTax The price is calculated including taxes and all applicable reductions such as discounts for sale and campaigns (should a campaign key be provdided on the request).
 * @property int $withoutTax This price excludes taxes, but also includes all applicable reductions.
 * If the order has an external price, this field becomes optional.
 * @property int $withTaxWithMembershipDiscountWithoutServiceCosts The price is calculated including taxes and all applicable reductions such as discounts for sale and campaigns (should a campaign key be provdided on the request), and membership discount.
 * @property int $withoutTaxWithMembershipDiscount This price excludes taxes, but also includes all applicable reductions and membership discount.
 * If the order has an external price, this field will not be included in the response payload.
 * @property int $costCapture The exact cost captured: order total value - giftcard value - total membership discount
 * @property mixed $itemGroups
 * @property bool $hasExternalPrices Indicates whether the order contains external prices.
 */
class OrderCost extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'tax' => OrderTax::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'appliedFees' => OrderFee::class,
        'appliedReductions' => OrderReduction::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}

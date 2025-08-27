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
 * @property OrderReduction[] $appliedReductions If the order has an external price, this field will not be included in the response payload.
 * @property OrderItemAbsoluteVoucherReducedPrice $absoluteVoucherReducedPrice If the order has an external price, this field will not be included in the response payload.
 * @property OrderItemPriceReference $reference If the order has an external price, this field will not be included in the response payload.
 * @property OrderTax $tax
 * @property int $withTax
 * @property int $withoutTax If the order has an external price, this field becomes optional.
 * @property int $overrideWithoutTax If the order has an external price, this field will not be included in the response payload.
 * @property int $overrideWithTax If the order has an external price, this field will not be included in the response payload.
 * @property int $undiscountedWithOutTax Un-discounted item price **excluding** taxes
 * If the order has an external price, this field will not be included in the response payload.
 * @property int $undiscountedWithTax Un-discounted item price **including** taxes
 * If the order has an external price, this field will not be included in the response payload.
 */
class OrderItemPrice extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'tax' => OrderTax::class,
        'reference' => OrderItemPriceReference::class,
        'absoluteVoucherReducedPrice' => OrderItemAbsoluteVoucherReducedPrice::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
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

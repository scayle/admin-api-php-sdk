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
 * @property int $id
 * @property int $availableQuantity
 * @property string $basketItemKey
 * @property string $currency The three character [ISO-4217](https://en.wikipedia.org/wiki/ISO_4217#Active_codes) currency code that identifies the currency. The currency is defined on the configuration of the shop, and can be modified in the cloud panel.
 * @property OrderItemDeliveryForecast $deliveryForecast
 * @property mixed $legacyCustomData Custom data added to the order item (legacy feature)
 * @property int $packageId
 * @property OrderItemPrice $price
 * @property OrderItemLowestPriorPrice $lowestPriorPrice
 * @property OrderItemProduct $product
 * @property OrderItemPromotion $promotion Order item promotion; will be soon deprecated.
 * @property OrderItemPromotion[] $promotions Order item promotions
 * @property string $key
 * @property string $reservationKey
 * @property string $status Possible values: available, unavailable, deliverable, undeliverable, cancelled, returned.
 * @property OrderItemVariant $variant
 * @property int $warehouseId
 * @property OrderItemGroup $itemGroup
 * @property string $campaignKey Reference to the campaign applied to this order
 * @property OrderItemMerchant $merchant
 * @property string $createdAt Timestamp when the order item is created
 * @property string $updatedAt Timestamp when the order item is updated
 */
class OrderItem extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'deliveryForecast' => OrderItemDeliveryForecast::class,
        'price' => OrderItemPrice::class,
        'lowestPriorPrice' => OrderItemLowestPriorPrice::class,
        'product' => OrderItemProduct::class,
        'promotion' => OrderItemPromotion::class,
        'variant' => OrderItemVariant::class,
        'itemGroup' => OrderItemGroup::class,
        'merchant' => OrderItemMerchant::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
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

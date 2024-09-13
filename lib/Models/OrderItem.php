<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property int $availableQuantity
 * @property string $currency The three character [ISO-4217](https://en.wikipedia.org/wiki/ISO_4217#Active_codes) currency code that identifies the currency. The currency is defined on the configuration of the shop, and can be modified in the cloud panel.
 * @property OrderItemDeliveryForecast $deliveryForecast
 * @property mixed $legacyCustomData Custom data added to the order item (legacy feature)
 * @property int $packageId
 * @property OrderItemPrice $price
 * @property OrderItemLowestPriorPrice $lowestPriorPrice
 * @property OrderItemProduct $product
 * @property OrderItemPromotion $promotion
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
    protected $defaultValues = [
    ];

    protected $classMap = [
        'deliveryForecast' => OrderItemDeliveryForecast::class,
        'price' => OrderItemPrice::class,
        'lowestPriorPrice' => OrderItemLowestPriorPrice::class,
        'product' => OrderItemProduct::class,
        'promotion' => OrderItemPromotion::class,
        'variant' => OrderItemVariant::class,
        'itemGroup' => OrderItemGroup::class,
        'merchant' => OrderItemMerchant::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

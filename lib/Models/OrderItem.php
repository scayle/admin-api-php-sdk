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
 * @property string $status
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
        'deliveryForecast' => \AboutYou\Cloud\AdminApi\Models\OrderItemDeliveryForecast::class,
        'price' => \AboutYou\Cloud\AdminApi\Models\OrderItemPrice::class,
        'lowestPriorPrice' => \AboutYou\Cloud\AdminApi\Models\OrderItemLowestPriorPrice::class,
        'product' => \AboutYou\Cloud\AdminApi\Models\OrderItemProduct::class,
        'promotion' => \AboutYou\Cloud\AdminApi\Models\OrderItemPromotion::class,
        'variant' => \AboutYou\Cloud\AdminApi\Models\OrderItemVariant::class,
        'itemGroup' => \AboutYou\Cloud\AdminApi\Models\OrderItemGroup::class,
        'merchant' => \AboutYou\Cloud\AdminApi\Models\OrderItemMerchant::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

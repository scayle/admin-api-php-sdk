<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property int $availableQuantity
 * @property OrderItemDeliveryForecast $deliveryForecast
 * @property mixed $legacyCustomData Custom data added to the order item (legacy feature)
 * @property int $packageId
 * @property OrderItemPrice $price
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
 */
class OrderItem extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'deliveryForecast' => \AboutYou\Cloud\AdminApi\Models\OrderItemDeliveryForecast::class,
        'price' => \AboutYou\Cloud\AdminApi\Models\OrderItemPrice::class,
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

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property int $availableQuantity
 * @property OrderItemDeliveryForecast $deliveryForecast
 * @property array $legacyCustomData
 * @property int $packageId
 * @property OrderItemPrice $price
 * @property OrderItemProduct $product
 * @property string $key
 * @property string $reservationKey
 * @property string $status
 * @property OrderItemVariant $variant
 * @property int $warehouseId
 * @property OrderItemGroup $itemGroup
 * @property string $campaignKey Reference to the campaign applied to this order
 */
class OrderItem extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'deliveryForecast' => \AboutYou\Cloud\AdminApi\Models\OrderItemDeliveryForecast::class,
        'price' => \AboutYou\Cloud\AdminApi\Models\OrderItemPrice::class,
        'product' => \AboutYou\Cloud\AdminApi\Models\OrderItemProduct::class,
        'variant' => \AboutYou\Cloud\AdminApi\Models\OrderItemVariant::class,
        'itemGroup' => \AboutYou\Cloud\AdminApi\Models\OrderItemGroup::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

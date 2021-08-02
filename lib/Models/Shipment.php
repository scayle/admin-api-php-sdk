<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $shopKey
 * @property string $countryCode
 * @property string $carrier
 * @property string $deliveryDate
 * @property ShipmentOrderItem[] $items
 * @property int $orderId
 * @property string $returnIdentCode
 * @property string $shipmentKey
 */
class Shipment extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'items' => \AboutYou\Cloud\AdminApi\Models\ShipmentOrderItem::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $shopKey Description of why the return is initiated
 * @property string $countryCode ISO 3166 alpha 2 country code; use shop country ID instead of country code when a country is ambiguous within a shop
 * @property string $carrier Defines the carrier key used, e.g. DHL
 * @property string $deliveryDate Defines the timestamp of the package leaving the warehouse
 * @property ShipmentOrderItem[] $items Collection of items shipped
 * @property int $orderId Unique identity of the order the shipment was part of
 * @property string $returnIdentCode Unique ID generated for product return (in case the customer prefers to return the product in later point of time)
 * @property string $shipmentKey A key that is assigned to uniquely identify a Shipment
 */
class Shipment extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'items' => ShipmentOrderItem::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

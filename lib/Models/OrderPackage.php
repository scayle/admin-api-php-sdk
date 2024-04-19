<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $shipmentKey
 * @property string $carrierKey
 * @property OrderPackageDeliveryDate $deliveryDate
 * @property string $deliveryStatus
 * @property OrderPackageTracking $tracking
 */
class OrderPackage extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'deliveryDate' => OrderPackageDeliveryDate::class,
        'tracking' => OrderPackageTracking::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

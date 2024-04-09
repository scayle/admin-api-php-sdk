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
        'deliveryDate' => \AboutYou\Cloud\AdminApi\Models\OrderPackageDeliveryDate::class,
        'tracking' => \AboutYou\Cloud\AdminApi\Models\OrderPackageTracking::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

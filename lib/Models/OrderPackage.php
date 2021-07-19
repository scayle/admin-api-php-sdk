<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $carrierKey
 * @property OrderPackageDeliveryDate $deliveryDate
 * @property string $deliveryStatus
 */
class OrderPackage extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'deliveryDate' => \AboutYou\Cloud\AdminApi\Models\OrderPackageDeliveryDate::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

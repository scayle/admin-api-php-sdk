<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderDeliverable $deliverable
 * @property OrderSubsequentDelivery $subsequentDelivery
 */
class OrderItemDeliveryForecast extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'subsequentDelivery' => OrderSubsequentDelivery::class,
        'deliverable' => OrderDeliverable::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

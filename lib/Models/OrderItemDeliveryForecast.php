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
        'subsequentDelivery' => \AboutYou\Cloud\AdminApi\Models\OrderSubsequentDelivery::class,
        'deliverable' => \AboutYou\Cloud\AdminApi\Models\OrderDeliverable::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

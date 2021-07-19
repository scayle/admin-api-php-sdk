<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderSubsequentDelivery $subsequentDelivery
 */
class OrderItemDeliveryForecast extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'subsequentDelivery' => \AboutYou\Cloud\AdminApi\Models\OrderSubsequentDelivery::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $policy
 * @property string $deliveredOn
 * @property int $deliveryCosts
 * @property int $expressDeliveryCosts
 */
class OrderShipping extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

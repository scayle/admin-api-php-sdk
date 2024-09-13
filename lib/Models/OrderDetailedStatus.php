<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property mixed $order
 * @property mixed $shipping
 * @property mixed $billing
 */
class OrderDetailedStatus extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'order' => OrderDetailedStatusItem::class,
        'shipping' => OrderDetailedStatusItem::class,
        'billing' => OrderDetailedStatusItem::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

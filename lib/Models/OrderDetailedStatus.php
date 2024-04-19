<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderDetailedStatusItem $order
 * @property OrderDetailedStatusItem $shipping
 * @property OrderDetailedStatusItem $billing
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

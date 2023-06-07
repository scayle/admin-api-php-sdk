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
        'order' => \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatusItem::class,
        'shipping' => \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatusItem::class,
        'billing' => \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatusItem::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $status Status of the order, e.g. invoice_completed
 * @property OrderDetailedStatus $detailedStatus
 */
class OrderStatus extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'detailedStatus' => OrderDetailedStatus::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

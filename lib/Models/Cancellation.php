<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $shopKey
 * @property string $countryCode
 * @property CancellationItem[] $items
 * @property int $orderId
 */
class Cancellation extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'items' => \AboutYou\Cloud\AdminApi\Models\CancellationItem::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

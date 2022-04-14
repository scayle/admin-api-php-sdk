<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $shopKey A key that uniquely identifies the shop within the tenant's ecosystem. Must be exactly 2 chars long.
 * @property string $countryCode ISO 3166 alpha 2 country code
 * @property CancellationItem[] $items Collection of items requested for cancellation
 * @property int $orderId Unique identity of the order for which the cancellation was requested
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

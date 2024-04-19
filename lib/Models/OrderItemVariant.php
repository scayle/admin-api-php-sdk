<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderItemVariantStock $stock
 * @property int $id
 * @property string $referenceKey External reference set by the client to integrate third party systems.
 */
class OrderItemVariant extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'stock' => OrderItemVariantStock::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

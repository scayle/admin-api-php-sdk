<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $name The product name.
 * @property OrderItemProductImage[] $images
 */
class OrderItemProduct extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'images' => \AboutYou\Cloud\AdminApi\Models\OrderItemProductImage::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

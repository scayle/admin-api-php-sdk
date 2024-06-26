<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The merchant id to which the item belongs.
 * @property string $referenceKey A merchant reference key the item belongs to.
 */
class OrderItemMerchant extends ApiObject
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

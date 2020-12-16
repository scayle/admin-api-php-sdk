<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $productId Backbone Core's internal product identifier.
 * @property string $productReferenceKey Tenant provided product identifier.
 * @property string $shopKey A key that uniquely identifies the shop within the tenant's ecosystem.
 * @property string $sortKey The sort key.
 * @property float $sortValue The value used for sorting.
 */
class ProductSorting extends ApiObject
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

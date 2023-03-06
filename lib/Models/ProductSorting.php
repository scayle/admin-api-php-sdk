<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $productId Backbone Core's internal product identifier.
 * @property string $productReferenceKey Tenant provided product identifier.
 * @property string $shopKey A key that uniquely identifies the shop within the tenant's ecosystem.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $sortKey The sort key.
 * @property int $sortValue The value used for sorting.
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

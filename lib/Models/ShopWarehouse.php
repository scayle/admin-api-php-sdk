<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the warehouse created by Backbone Core.
 * @property string $referenceKey A key that uniquely identifies the warehouse within the tenant's ecosystem.
 * @property int $priority The priority of the warehouse.
 * @property PackageGroup $packageGroup The assigned package group of the warehouse.
 */
class ShopWarehouse extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'packageGroup' => \AboutYou\Cloud\AdminApi\Models\PackageGroup::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

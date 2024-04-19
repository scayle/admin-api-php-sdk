<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the warehouse created by SCAYLE.
 * @property string $referenceKey A key that uniquely identifies the warehouse within the tenant's ecosystem.
 * @property int $priority The priority of the warehouse. The higher the value, the higher the priority.
 * @property PackageGroup $packageGroup The assigned package group of the warehouse.
 */
class ShopCountryWarehouse extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'packageGroup' => PackageGroup::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

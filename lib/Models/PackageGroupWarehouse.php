<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $warehouseId The ID of the warehouse created by SCAYLE.
 * @property string $warehouseReferenceKey A key that uniquely identifies the warehouse within the tenant's ecosystem.
 */
class PackageGroupWarehouse extends ApiObject
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

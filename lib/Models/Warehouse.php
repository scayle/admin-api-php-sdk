<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the warehouse created by SCAYLE.
 * @property string $referenceKey A key that uniquely identifies the warehouse within the tenant's ecosystem.
 * @property Merchant[] $merchants A list of merchants the warehouse is attached to.
 * @property WarehouseShopCountry[] $shopCountries Shop country information related to the warehouse.
 */
class Warehouse extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'merchants' => \AboutYou\Cloud\AdminApi\Models\Merchant::class,
        'shopCountries' => \AboutYou\Cloud\AdminApi\Models\WarehouseShopCountry::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

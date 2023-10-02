<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $shopKey The key of the shop created by SCAYLE.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property int $priority The priority of the warehouse. The higher the value, the higher the priority.
 * @property PackageGroup $packageGroup The assigned package group of the warehouse.
 */
class WarehouseShopCountry extends ApiObject
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

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the shop country created by Backbone Core.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $defaultLanguageCode ISO-3166 country code and ISO-639 language code.
 * @property string[] $supportedLanguageCodes List of supported language codes.
 * @property string $url Url of the shop country.
 * @property bool $active Defines if the shop country is active.
 * @property bool $deleted Defines it the shop country is deleted.
 * @property string $priceGroupKey Key of the price group the shop country is assigned to.
 * @property ShopProperty[] $properties The properties assigned to the shop country.
 * @property Assortment $assortment
 * @property ShopWarehouse[] $warehouses A list of warehouses attached to the shop country.
 * @property mixed $customData
 */
class ShopCountry extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'assortment' => \AboutYou\Cloud\AdminApi\Models\Assortment::class,
    ];

    protected $collectionClassMap = [
        'properties' => \AboutYou\Cloud\AdminApi\Models\ShopProperty::class,
        'warehouses' => \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

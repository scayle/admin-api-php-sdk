<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the shop country created by SCAYLE.
 * @property string $shopKey The key of the shop created by SCAYLE.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $defaultLanguageCode ISO-3166 country code and ISO-639 language code.
 * @property string[] $supportedLanguageCodes List of supported language codes.
 * @property string $url Url of the shop country.
 * @property bool $active Defines if the shop country is active.
 * @property bool $deleted Defines if the shop country is deleted.
 * @property string $priceGroupKey Key of the price group the shop country is assigned to.
 * @property string $currencyCode The currency used in the shop country.
 * @property Assortment $assortment Rules that defines what products can be sold within which Shop country
 * @property ShopCountryWarehouse[] $warehouses A list of warehouses attached to the shop country.
 * @property ShopCountryPriceRounding[] $priceRoundings List of price rounding configurations.
 * @property mixed $customData Arbitrary fields assigned to Shop countries
 */
class ShopCountry extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'assortment' => Assortment::class,
    ];

    protected $collectionClassMap = [
        'warehouses' => ShopCountryWarehouse::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

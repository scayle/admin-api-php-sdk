<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the shop created by Backbone Core.
 * @property string $key A key that uniquely identifies the shop within the tenant's ecosystem. Must be exactly 4 chars long.
 * @property string $name Full name of the Shop.
 * @property string $url Url of the Shop.
 * @property string $logoUrl The Url of the logo assigned to the shop.
 * @property ShopLogoSource $logoSource A source specifieng where to download the logo from.
 * @property bool $active Defines if the shop is active.
 * @property bool $deleted Defines it the shop is deleted.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $languageCode ISO-3166 country code and ISO-639 language code.
 * @property string $priceGroupKey Key of the price group the shop is assigned to.
 * @property ShopProperty[] $properties The properties assigned to the shop.
 * @property Assortment $assortment 
 */
class Shop extends ApiObject
{
    protected $defaultValues = [
        
    ];

    protected $classMap = [
		'logoSource' => \AboutYou\Cloud\AdminApi\Models\ShopLogoSource::class,
		'assortment' => \AboutYou\Cloud\AdminApi\Models\Assortment::class,
    ];

    protected $collectionClassMap = [
        'properties' => \AboutYou\Cloud\AdminApi\Models\ShopProperty::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the shop created by Backbone Core.
 * @property string $referenceKey A key that uniquely identifies the shop within the tenant's ecosystem.
 * @property string $parentShop The referenceKey of a shop.
 * @property string $name Full name of the Shop.
 * @property string $url Url of the Shop.
 * @property string $logoUrl The Url of the logo assigned to the shop.
 * @property ShopLogoSource $logoSource A source specifieng where to download the logo from.
 * @property bool $active Defines if the shop is active.
 * @property bool $deleted Defines it the shop is deleted.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $languageCode ISO-3166 country code and ISO-639 language code.
 * @property string $priceGroupKey Key of the price group the shop is assigned to.
 * @property string $companyName Name of the company the shop is assigned to.
 * @property ShopProperty[] $properties The properties assigned to the shop.
 */
class Shop extends ApiObject
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
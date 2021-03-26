<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the shop created by Backbone Core.
 * @property string $key A key that uniquely identifies the shop within the tenant's ecosystem. Must be exactly 4 chars long.
 * @property string $name Full name of the Shop.
 * @property string $logoUrl The Url of the logo assigned to the shop.
 * @property AssetSource $logoSource A source specifieng where to download the logo from.
 * @property bool $active Defines if the shop is active.
 * @property bool $deleted Defines it the shop is deleted.
 * @property string $priceGroupKey Key of the price group the shop is assigned to.
 * @property int $shopCategoryTreeId Defines shop categories tree id.
 * @property ShopCountry[] $countries The countries assigned to the shop.
 * @property mixed $customData
 */
class Shop extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'logoSource' => \AboutYou\Cloud\AdminApi\Models\AssetSource::class,
    ];

    protected $collectionClassMap = [
        'countries' => \AboutYou\Cloud\AdminApi\Models\ShopCountry::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the shop created by SCAYLE.
 * @property string $key A key that uniquely identifies the shop within the tenant's ecosystem. Must be **exactly two characters** long.
 * @property string $name Full name of the shop.
 * @property string $logoUrl The URL of the logo assigned to the shop.
 * @property AssetSource $logoSource A source specifying where to download the logo from.
 * @property bool $active Defines if the shop is active.
 * @property bool $deleted Defines if the shop is deleted.
 * @property string $priceGroupKey Key of the price group the shop is assigned to.
 * @property int $shopCategoryTreeId Defines shop category tree id. Can be set only on creation.
 * @property int $companyId The ID of the company the shop is assigned to.
 * @property ShopCountry[] $countries The countries assigned to the shop. Can be set only on creation.
 * @property mixed $customData Arbitrary fields assigned to Shop
 */
class Shop extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'logoSource' => AssetSource::class,
    ];

    protected $collectionClassMap = [
        'countries' => ShopCountry::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

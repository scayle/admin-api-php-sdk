<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Models;

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
 * @property mixed $smartSortingKey
 */
class Shop extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'logoSource' => AssetSource::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'countries' => ShopCountry::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}

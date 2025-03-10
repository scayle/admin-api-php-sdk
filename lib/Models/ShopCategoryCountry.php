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
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property int $shopCountryId Id of Shop Country.
 * @property string $path String representation of the URL path to the category.
 * @property bool $isActive Declares whether the shop category is active or not.
 * @property bool $isVisible Declares whether the shop category is visible in the shop or not.
 * @property bool $isExcludedFromSearch Declares whether the shop category country should be excluded from search.
 * @property ShopCategoryProperty[] $properties The properties assigned to the shop category.
 * @property mixed $customData
 */
class ShopCategoryCountry extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'properties' => ShopCategoryProperty::class,
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

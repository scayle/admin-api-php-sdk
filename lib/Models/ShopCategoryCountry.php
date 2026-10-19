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
 * @property bool $isIncludedInSearchWhenInvisible Declares whether the shop category country should still be included in search results while it is invisible.
 * @property ShopCategoryProperty[] $properties The properties assigned to the shop category.
 * @property mixed $customData
 * @property string $smartSortingKey System smart sorting key or custom smart sorting key from the catalog.
 * @property string $customSortingKey A custom sorting key that will be applied to sort the products displayed in a shopCategoryCountry.
 * - When a customSortingKey is not provided for a newly created shopCategoryCountry, it will be inherited from its parent shopCategoryCountry.
 * - When the customSortingKey is updated for an existing shopCategoryCountry, the update will be propagated to all of its child shopCategoryCountry entries.
 * - When the customSortingKey is set to null or not provided, it will be removed from all of its child and ancestor shopCategoryCountry entries.
 * - When the parent of a shopCategoryCountry is updated, the customSortingKey will be propagated from the new parent to the updated shopCategoryCountry and its child shopCategoryCountries.
 * @property ShopCategoryCountryCustomerSegmentOverride[] $customerSegmentOverrides Customer segment sorting overrides for this shop category country.
 * Each item must include at least one of `smartSortingKey` or `customSortingKey`, and a priority. An item with neither key is rejected.
 * Returned on shop category reads when `with=countries.customerSegmentOverrides` is set, and on shop category country reads when `with=customerSegmentOverrides` is set.
 * On write, omit the property to leave existing assignments unchanged, send an empty array to remove them, or send items to replace the full set.
 * Each `customerSegmentId` and each `priority` must be unique. At most 30 overrides are accepted.
 * Only active customer segments can be attached.
 * Overrides are accepted only when `smartSortingKey` or `customSortingKey` is also present in the same request.
 * @property mixed $seo
 */
class ShopCategoryCountry extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'properties' => ShopCategoryProperty::class,
        'customerSegmentOverrides' => ShopCategoryCountryCustomerSegmentOverride::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

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
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'properties' => ShopCategoryProperty::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

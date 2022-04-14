<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the shop category.
 * @property int $parentId The ID of the parent shop category.
 * @property int $leftSiblingId The ID of the left sibling shop category. It defines the shop category position in the category tree.
 * @property array $name The localized category name.
 * @property ShopCategoryProductSet[] $productSets Product sets define which products to include in the shop category.
 * @property string[] $supportedFilterGroups List of supported filter groups.
 * @property ShopCategoryProperty[] $properties The properties assigned to the shop category. Can be specified on creation only.
 * @property bool $isActive Declares whether the shop category is active or not. Can be specified on creation only.
 * @property bool $isVisible Declares whether the shop category is visible in the shop or not. Can be specified on creation only.
 * @property mixed $customData Arbitrary fields assigned to shop categories
 * @property ShopCategoryCountry[] $countries List of country specific configurations.
 */
class ShopCategory extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'productSets' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class,
        'properties' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class,
        'countries' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

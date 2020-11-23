<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name The name of the category, which is displayed in the shop.
 * @property string $url String representation of the URL path to the category.
 * @property bool $isActive Declares whether the shop category is active or not.
 * @property bool $isVisible Declares whether the shop category is visible in the shop or not.
 * @property ShopCategoryProperty[] $properties The properties assigned to the shop category.
 */
class ShopCategoryConfiguration extends ApiObject
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

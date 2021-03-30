<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the shop category.
 * @property int $parentId The ID of the parent shop category.
 * @property int $leftSiblingId The ID of the left sibling shop category. It defines the shop category position in the category tree.
 * @property string $name The internal name of the shop category.
 * @property bool $stopBubbleUp When the flag is set to true on a category node, the category is a self containing tree. The parent of that node will not inherit the product assortments of the node.
 * @property ShopCategoryProducts $products
 * @property ShopCategoryConfiguration $configuration
 * @property string[] $supportedFilterGroups List of supported filter groups.
 * @property mixed $customData
 */
class ShopCategory extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'products' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class,
        'configuration' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

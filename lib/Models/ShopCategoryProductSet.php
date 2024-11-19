<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $productSetId The ID of the product set.
 * @property int $referencedProductSetId The ID of the referenced product set.
 * @property int[] $includeProductIds Product IDs, which are explicitly included in the shop category (limited to a maximum of 10,000 Product IDS).
 * @property int[] $excludeProductIds Product IDs, which are explicitly excluded from the shop category (limited to a maximum of 10,000 Product IDS).
 * @property bool $isNew Declares whether the product set should only contain new products.
 * @property ShopCategoryAttributeCriterion[] $attributes Defines which products to include or exclude by attributes.
 */
class ShopCategoryProductSet extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'attributes' => ShopCategoryAttributeCriterion::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

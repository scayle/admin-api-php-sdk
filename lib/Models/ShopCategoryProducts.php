<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property ShopCategoryProductIds $ids
 * @property ShopCategoryProductCriteria[] $criteria Criteria, which define products included in or excluded from the shop category.
 */
class ShopCategoryProducts extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'ids' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductIds::class,
    ];

    protected $collectionClassMap = [
        'criteria' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductCriteria::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

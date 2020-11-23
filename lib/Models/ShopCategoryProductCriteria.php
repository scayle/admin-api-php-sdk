<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property bool $isSale
 * @property bool $isNew
 * @property ShopCategoryAttributeCriterion[] $attributes
 * @property ShopCategoryCategoryCriterion $categories
 */
class ShopCategoryProductCriteria extends ApiObject
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

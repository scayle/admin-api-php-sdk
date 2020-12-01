<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property bool $isNew
 * @property ShopCategoryAttributeCriterion[] $attributes
 * @property ShopCategoryCategoryCriterion $categories
 */
class ShopCategoryProductCriteria extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'categories' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryCategoryCriterion::class,
    ];

    protected $collectionClassMap = [
        'attributes' => \AboutYou\Cloud\AdminApi\Models\ShopCategoryAttributeCriterion::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

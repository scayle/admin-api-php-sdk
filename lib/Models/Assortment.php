<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property MasterCategoryAssortmentConfiguration $masterCategories Configuration of Master Category includes/excludes.
 * @property ProductAssortmentConfiguration $products Configuration of Product includes/excludes.
 * @property AttributeAssortmentConfiguration[] $attributes Configuration of Attribute includes/excludes.
 */
class Assortment extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'masterCategories' => \AboutYou\Cloud\AdminApi\Models\MasterCategoryAssortmentConfiguration::class,
        'products' => \AboutYou\Cloud\AdminApi\Models\ProductAssortmentConfiguration::class,
    ];

    protected $collectionClassMap = [
        'attributes' => \AboutYou\Cloud\AdminApi\Models\AttributeAssortmentConfiguration::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

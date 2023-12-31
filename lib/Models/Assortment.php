<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property MasterCategoryAssortmentConfiguration $masterCategories Configuration of master category includes/excludes.
 * @property ProductAssortmentConfiguration $products Configuration of product includes/excludes.
 * @property AttributeAssortmentConfiguration[] $attributes Configuration of attribute includes/excludes.
 * @property MerchantAssortmentConfiguration $merchantReferenceKeys Configuration of merchant includes/excludes.
 */
class Assortment extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'masterCategories' => \AboutYou\Cloud\AdminApi\Models\MasterCategoryAssortmentConfiguration::class,
        'products' => \AboutYou\Cloud\AdminApi\Models\ProductAssortmentConfiguration::class,
        'merchantReferenceKeys' => \AboutYou\Cloud\AdminApi\Models\MerchantAssortmentConfiguration::class,
    ];

    protected $collectionClassMap = [
        'attributes' => \AboutYou\Cloud\AdminApi\Models\AttributeAssortmentConfiguration::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

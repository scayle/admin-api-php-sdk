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
        'masterCategories' => MasterCategoryAssortmentConfiguration::class,
        'products' => ProductAssortmentConfiguration::class,
        'merchantReferenceKeys' => MerchantAssortmentConfiguration::class,
    ];

    protected $collectionClassMap = [
        'attributes' => AttributeAssortmentConfiguration::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

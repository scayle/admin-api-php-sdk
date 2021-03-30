<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $referenceKey A key that uniquely identifies a group of products (e.g., all colors of a shirt) within the tenant's ecosystem.
 * @property ProductMasterCategories $categories The master categories all products of this group are attached to.
 * @property Attribute[] $attributes A list of attributes attached to the master.
 */
class Master extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'categories' => \AboutYou\Cloud\AdminApi\Models\ProductMasterCategories::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id Id assigned by BACKBONE Core.
 * @property string $referenceKey A key that uniquely identifies the variant of a product (usually an SKU) within the tenant's ecosystem.
 * @property Attribute[] $attributes A list of attributes attached to the product variant.
 * @property ProductVariantPrice[] $prices A list of prices attached to the product variant.
 */
class ProductVariant extends ApiObject
{
    protected $defaultValues = [
        
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'prices' => \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class,
        'attributes' => \AboutYou\Cloud\AdminApi\Models\Attribute::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
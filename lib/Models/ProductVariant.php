<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id ID assigned by SCAYLE.
 * @property string $referenceKey A key that uniquely identifies the variant of a product (usually an SKU) within the tenant's ecosystem.
 * @property string $ean An ean that refers to a product variant .
 * @property Attribute[] $attributes A list of attributes attached to the product variant.
 * @property ProductVariantPrice[] $prices A list of prices attached to the product variant.
 * @property ProductVariantStock[] $stocks The product variant stock information.
 * @property mixed $customData
 * @property bool $isComposite Indicates whether the variant is composite.
 * @property RelatedProductVariant[] $relatedVariants A list of variants that belong to the composite variant.
 */
class ProductVariant extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'prices' => ProductVariantPrice::class,
        'attributes' => Attribute::class,
        'relatedVariants' => RelatedProductVariant::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

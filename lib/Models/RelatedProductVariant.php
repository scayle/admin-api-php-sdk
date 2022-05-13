<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $variantReferenceKey A key that uniquely identifies the variant, which is a part of a composite variant.
 * @property bool $isMainVariant Defines the main variant of a composite product. Each composite product must contain one and only one main variant.
 */
class RelatedProductVariant extends ApiObject
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

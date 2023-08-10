<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the product created by SCAYLE.
 * @property string[] $problems If product is in problem state, the reasons are listed here.
 * @property string $referenceKey A key that uniquely identifies the product (e.g., a shirt in a specific color) within the tenant's ecosystem.
 * @property array $name The localized product name. At least the base language that is configured in SCAYLE is mandatory.
 * @property Master $master The master the product is attached to.
 * @property string $state The state of the product determined by the state evaluation process. The only possible values to request are `live`, `draft` and `blocked`. The `problem` state can only be the result of the state evaluation process. If product is in problem state, the reasons are listed in read-only 'problems' field. The `new` and `inApproval` states can be set in the SCAYLE Panel.
 * @property Attribute[] $attributes A list of attributes attached to the product.
 * @property ProductVariant[] $variants A list of product variants attached to the product.
 * @property ProductImage[] $images A list of product images attached to the product.
 * @property ProductSorting[] $productSortings A list of product sortings.
 * @property mixed $customData
 * @property bool $isComposite Indicates whether the product is composite.
 * @property string[] $merchantReferenceKeys A list of merchant reference keys the product belongs to.
 */
class Product extends ApiObject
{
    protected $defaultValues = [
        'state' => 'live',
    ];

    protected $classMap = [
        'master' => \AboutYou\Cloud\AdminApi\Models\Master::class,
    ];

    protected $collectionClassMap = [
        'variants' => \AboutYou\Cloud\AdminApi\Models\ProductVariant::class,
        'images' => \AboutYou\Cloud\AdminApi\Models\ProductImage::class,
        'attributes' => \AboutYou\Cloud\AdminApi\Models\Attribute::class,
        'productSortings' => \AboutYou\Cloud\AdminApi\Models\ProductSorting::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

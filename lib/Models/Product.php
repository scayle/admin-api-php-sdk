<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the product created by Backbone Core.
 * @property string[] $problems If product is in problem state, the reasons are listed here.
 * @property string $referenceKey A key that uniquely identifies the product (e.g. a shirt in a specific color) within the tenant's ecosystem.
 * @property array $name The localized product name. At least the base language that is configured in Backbone Core is mandatory.
 * @property Master $master 
 * @property string $state During a write operation, the state can either be specified as `live` or `draft`.

Within a shop only products which are `live` are being shown.

If the desired state is set to `live`, the product will be validated by the following rules first:

1. The product data is complete and valid
  - The product is not missing any mandatory attributes (only if mandatory attribute groups are configured).
  - The product has at least one image (if images are configured as mandatory).
  - The product has no blacklisted term (if the feature is enabled).
  - The product does not have the same differentiating attribute with other products of the same master (if the feature is enabled).
2. At least one variant of the product has a valid price for the country that's connected to the shop.
3. At least one variant of the product is in stock (or sellable without stock) for the warehouse that's connected to the shop.
4. The product matches the assortment configuration of the shop.
5. The product passes all other filters (e.g. product/variant is neither deleted nor blocked).

If all checks pass, the product state will be set to `live`.
If one or more checks fail, the product state will be set to `problem`. Additionally the response will contain a property named `problems`, listing all validation errors. These errors needs to get resolved, before a product can go `live`.

 * @property string[][] $categories All products belonging to the same master must share the same categories.

Every category must be represented as an ordered list representing a category path. The lowest index of a category
list must contain the root category and the highest index must contain the leaf category.

 * @property SimpleAttribute[]|SimpleAttributeList[]|LocalizedAttribute[]|LocalizedAttributeList[]|AdvancedAttribute[]|AdvancedAttributeList[] $attributes 
 * @property ProductVariant[] $variants 
 * @property ProductImage[] $images 
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
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
        'attributes' => [
            'discriminator' => 'type',
            'mapping' => [
                    'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                    'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
                    'localizedString' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttribute::class,
                    'localizedStringList' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttributeList::class,
                    'advanced' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttribute::class,
                    'advancedList' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttributeList::class,
            ]
        ],
    ];
}
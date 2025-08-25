<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property int $id ID assigned by SCAYLE.
 * @property string $referenceKey A key that uniquely identifies the variant of a product (usually an SKU) within the tenant's ecosystem.
 * @property string[] $merchantReferenceKeys A list of merchant reference keys the variant belongs to.
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
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'prices' => ProductVariantPrice::class,
        'attributes' => Attribute::class,
        'relatedVariants' => RelatedProductVariant::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}

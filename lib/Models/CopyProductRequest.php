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
 * @property string $referenceKey The reference key to assign to the newly copied product. Must be unique within the tenant's ecosystem.
 * @property CopyProductVariant[] $variants Mapping of every source variant reference key to a new variant reference key. All variants of the source product must be mapped.
 * @property CopyProductMaster $master
 * @property string[] $merchantReferenceKeys When provided, the copy is only applied to these specific merchant entities.
 * @property CopyProductImage[] $images Overrides for source image reference keys on the copied product.
 * Image reference keys are globally unique across product images, so any source image that has a `referenceKey` must be remapped here to a new, unique value.
 * Source images without a `referenceKey` may also be remapped via this list, but doing so is optional. Source images that are not listed in this mapping are copied without a `referenceKey`.
 * @property bool $copyPrices When true, copies prices from the source product to the new product.
 * @property bool $copyStocks When true, copies stocks (including quantities and sellable timeframes) from the source product to the new product.
 */
class CopyProductRequest extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [
        'master' => CopyProductMaster::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'variants' => CopyProductVariant::class,
        'images' => CopyProductImage::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];
}

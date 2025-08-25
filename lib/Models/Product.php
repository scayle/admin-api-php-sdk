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
 * @property int $id The ID of the product created by SCAYLE.
 * @property string[] $problems If product is in problem state, the reasons are listed here.
 * @property string $referenceKey A key that uniquely identifies the product (e.g., a shirt in a specific color) within the tenant's ecosystem.
 * @property array<string> $name The localized product name. At least the base language that is configured in SCAYLE is mandatory.
 * @property Master $master The master the product is attached to.
 * @property string $state The state of the product determined by the state evaluation process. The only possible values to request are `live`, `draft` and `blocked`. The `problem` state can only be the result of the state evaluation process. If product is in problem state, the reasons are listed in read-only 'problems' field. The `new` and `inApproval` states can be set in the SCAYLE Panel. If a product belongs to multiple merchants, the state is returned based on the hierarchical order live, inApproval, problem, blocked, draft
 * @property Attribute[] $attributes A list of attributes attached to the product.
 * @property ProductVariant[] $variants A list of product variants attached to the product.
 * @property ProductImage[] $images A list of product images attached to the product.
 * @property ProductSorting[] $productSortings A list of product sortings.
 * @property mixed $customData
 * @property ProductSellableTimeframe[] $sellableTimeframes A list of product sellable timeframes.
 * @property bool $isComposite Indicates whether the product is composite.
 * @property string[] $merchantReferenceKeys A list of merchant reference keys the product belongs to.
 */
class Product extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
        'state' => 'live',
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'master' => Master::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'variants' => ProductVariant::class,
        'images' => ProductImage::class,
        'attributes' => Attribute::class,
        'productSortings' => ProductSorting::class,
        'sellableTimeframes' => ProductSellableTimeframe::class,
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

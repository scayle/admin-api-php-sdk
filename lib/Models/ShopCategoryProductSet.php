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
 * @property int $productSetId The ID of the product set.
 * @property int $referencedProductSetId The ID of the referenced product set.
 * @property int[] $includeProductIds Product IDs, which are explicitly included in the shop category (limited to a maximum of 10,000 Product IDS).
 * @property int[] $excludeProductIds Product IDs, which are explicitly excluded from the shop category (limited to a maximum of 10,000 Product IDS).
 * @property bool $isNew Declares whether the product set should only contain new products.
 * @property ShopCategoryAttributeCriterion[] $attributes Defines which products to include or exclude by attributes.
 */
class ShopCategoryProductSet extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'attributes' => ShopCategoryAttributeCriterion::class,
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

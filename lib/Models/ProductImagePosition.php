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
 * @property int $position Position of the image. Counting starts with 0, so when a product image should be on the first position, you have to send 0.
 * @property ProductImageShopCountryPosition[] $shopCountrySpecific Optional per-shop-country positions. When present, must contain at least one entry.
 * @property mixed $customData
 * @property ProductImageLocks $productLocks Image sorting locks for this product (`imagePositions` only).
 * Use PATCH video or create/update product to set `videoPositions`.
 */
class ProductImagePosition extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [
        'productLocks' => ProductImageLocks::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'shopCountrySpecific' => ProductImageShopCountryPosition::class,
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

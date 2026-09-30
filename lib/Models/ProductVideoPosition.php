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
 * @property int $position Position of the video. Counting starts with 0.
 * @property ProductVideoShopCountryPosition[] $shopCountrySpecific Optional per-shop-country positions. When present, must contain at least one entry.
 * @property mixed $customData
 * @property ProductVideoLocks $productLocks Video sorting locks for this product (`videoPositions` only).
 * Use PATCH image or create/update product to set `imagePositions`.
 */
class ProductVideoPosition extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [
        'productLocks' => ProductVideoLocks::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'shopCountrySpecific' => ProductVideoShopCountryPosition::class,
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

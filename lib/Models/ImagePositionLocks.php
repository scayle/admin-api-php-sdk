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
 * @property bool $isLocked Global image-position sorting lock for the product (application_id = null).
 * true creates the lock if missing; false is a no-op (locks can only be removed via unlock-asset-sortings).
 * @property ImagePositionLockShopCountry[] $shopCountrySpecific Per shop-country sorting locks. Omitted scopes are left unchanged.
 */
class ImagePositionLocks extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'shopCountrySpecific' => ImagePositionLockShopCountry::class,
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

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
 * @property string $shopKey A key that uniquely identifies the shop within the tenant's ecosystem. Must be exactly 2 chars long.
 * @property string $countryCode ISO 3166 alpha 2 country code; use shop country ID instead of country code when a country is ambiguous within a shop
 * @property CancellationItem[] $items Collection of items requested for cancellation
 * @property int $orderId Unique identity of the order for which the cancellation was requested
 * @property string $merchantReferenceKey Reference key of the merchant to which the cancellation belongs to.
 */
class Cancellation extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'items' => CancellationItem::class,
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

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
 * @property int $quantity Current quantity of SKU.
 * @property string $warehouseReferenceKey Reference key of warehouse for which the stock update is related to.
 * @property string $changedAt Date time when the stock changed in Iso8601 format.
 * @property bool $sellableWithoutStock Defines if the variant can be sold even when the available stock is 0.
 * @property string $merchantReferenceKey A merchant reference key the stock belongs to.
 * @property string $expectedAvailabilityAt Date when the stock is expected to be available. If provided, it MUST be in the future.
 */
class ProductVariantStock extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
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

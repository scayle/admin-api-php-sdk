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
 * @property OrderReduction[] $appliedReductions
 * @property OrderItemPriceReference $reference
 * @property OrderTax $tax
 * @property int $withTax
 * @property int $withoutTax
 * @property int $overrideWithoutTax
 * @property int $overrideWithTax
 * @property int $undiscountedWithOutTax Undiscounted item price **excluding** taxes
 * @property int $undiscountedWithTax Undiscounted item price **including** taxes
 */
class OrderItemPrice extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'tax' => OrderTax::class,
        'reference' => OrderItemPriceReference::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'appliedReductions' => OrderReduction::class,
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

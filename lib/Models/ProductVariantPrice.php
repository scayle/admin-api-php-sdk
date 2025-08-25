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
 * @property string $key Key assigned by SCAYLE.
 * @property int $price Price of the variant.
 * @property int $oldPrice Old price of the variant.
 * @property int $recommendedRetailPrice Recommended retail price of the variant.
 * @property int $buyingPrice Buying price of the variant.
 * @property float $tax A valid tax rate.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $currencyCode ISO 4217 currency code.
 * @property string $groupKey Key of the group the price is assigned to.
 * @property string $promotionKey Key of the promotion the price is assigned to.
 * @property ProductVariantUnitPrice $unitPrice Describes the price for a specific unit.
 * @property string $validFrom Controls when the price will be activated. If not present or null, the valid from is specified from now.
 * @property string $validTo Controls when the price will be deactivated. If not present or null, the price is valid forever.
 * @property string $merchantReferenceKey A merchant reference key the price belongs to.
 */
class ProductVariantPrice extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'unitPrice' => ProductVariantUnitPrice::class,
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

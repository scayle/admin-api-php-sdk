<?php

namespace AboutYou\Cloud\AdminApi\Models;

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
 */
class ProductVariantPrice extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'unitPrice' => \AboutYou\Cloud\AdminApi\Models\ProductVariantUnitPrice::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

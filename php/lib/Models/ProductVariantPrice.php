<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id Id assigned by BACKBONE Core.
 * @property string $currencyCode ISO 4217 currency code
 * @property string $countryCode ISO 3166 alpha 2 country code
 * @property int $price Price in the smalltest subunit, e.g Cent
 * @property int $oldPrice Old price in the smalltest subunit, e.g Cent
 * @property int $recommendedRetailPrice Recommended retail price in the smalltest subunit, e.g Cent
 * @property string $groupKey Key of the group the price is assigned to.
 * @property string $promotionKey Key of the promotion the price is assigned to.
 * @property ProductVariantUnitPrice $unitPrice Describes the price for a specific unit.
 * @property float $tax A valid tax rate
 * @property string $validFrom Controlls when the price will be activated. If not present or null, its intepretated as valid from now.
 * @property string $validTo Controlls when the price will be deactivated. If not present or null, the price is valid forever.
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
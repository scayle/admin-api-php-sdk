<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id 
 * @property string $currencyCode ISO 4217 currency code
 * @property string $countryCode ISO 3166 alpha 2 country code
 * @property int $price Price in the smalltest subunit, e.g Cent
 * @property int $oldPrice Old price in the smalltest subunit, e.g Cent
 * @property int $recommendedRetailPrice Recommended retail price in the smalltest subunit, e.g Cent
 * @property string $groupKey If present, the price will be added to the specified Price Group
 * @property string $promotionKey 
 * @property ProductVariantUnitPrice $unitPrice 
 * @property float $tax A valid tax rate
 * @property string $validFrom Controlls when the price will be activated. If not present or null, its intepretated as valid from now
 * @property string $validTo 
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
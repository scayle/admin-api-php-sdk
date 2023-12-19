<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the price rounding created by SCAYLE.
 * @property string $currencyCode Currency code in ISO 4217 format.
 * @property string $precision The precision that should be applied to a price, ENUM of "1.00", "5.00", "0.05", "0.99", "0.95", "0.90".
 * @property string $roundingType The rounding type that should be used when rounding a price.
 */
class ShopCountryPriceRounding extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $unit The name of the unit the amount and price references to.
 * @property int $amount The amount referenced by the price.
 * @property int $price The reference price.
 */
class ProductVariantUnitPrice extends ApiObject
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
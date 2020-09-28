<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property float $quantity New quantity of SKU
 * @property string $warehouseReferenceKey Reference key of warehouse for which the stock update is related to
 * @property string $merchantReferenceKey Reference key of merchant
 * @property string $changedAt Date time when the stock changed
 */
class ProductVariantStock extends ApiObject
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
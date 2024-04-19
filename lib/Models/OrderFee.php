<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderFeeAmount $amount
 * @property string $category
 * @property string $key
 * @property string $option
 * @property OrderTax $tax
 */
class OrderFee extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'amount' => OrderFeeAmount::class,
        'tax' => OrderTax::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

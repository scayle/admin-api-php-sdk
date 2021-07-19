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
        'amount' => \AboutYou\Cloud\AdminApi\Models\OrderFeeAmount::class,
        'tax' => \AboutYou\Cloud\AdminApi\Models\OrderTax::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

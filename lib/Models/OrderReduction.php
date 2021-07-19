<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderReductionAmount $amount
 * @property string $category
 * @property string $type
 */
class OrderReduction extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'amount' => \AboutYou\Cloud\AdminApi\Models\OrderReductionAmount::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

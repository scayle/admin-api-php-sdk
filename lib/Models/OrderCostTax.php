<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderCostVat $vat
 */
class OrderCostTax extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'vat' => \AboutYou\Cloud\AdminApi\Models\OrderCostVat::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

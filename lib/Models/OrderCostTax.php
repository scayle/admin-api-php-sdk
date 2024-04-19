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
        'vat' => OrderCostVat::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

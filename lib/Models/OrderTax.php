<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderVat $vat
 */
class OrderTax extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'vat' => OrderVat::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

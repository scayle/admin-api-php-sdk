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
        'vat' => \AboutYou\Cloud\AdminApi\Models\OrderVat::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

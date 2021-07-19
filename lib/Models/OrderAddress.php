<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property CustomerAddress $billing
 * @property CustomerAddress $forward
 * @property CustomerAddress $shipping
 */
class OrderAddress extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'billing' => \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class,
        'forward' => \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class,
        'shipping' => \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

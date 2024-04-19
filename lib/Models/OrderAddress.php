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
        'billing' => CustomerAddress::class,
        'forward' => CustomerAddress::class,
        'shipping' => CustomerAddress::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

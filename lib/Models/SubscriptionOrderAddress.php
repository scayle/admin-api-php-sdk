<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property SubscriptionOrderAddressInstance $shipping
 * @property SubscriptionOrderAddressInstance $billing
 */
class SubscriptionOrderAddress extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'shipping' => SubscriptionOrderAddressInstance::class,
        'billing' => SubscriptionOrderAddressInstance::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

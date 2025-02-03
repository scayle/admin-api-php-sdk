<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $shippingPolicyKey
 * @property string $carrierKey
 * @property SubscriptionOrderCarrierDeliveryDate $deliveryDate
 */
class SubscriptionOrderCarrier extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'deliveryDate' => SubscriptionOrderCarrierDeliveryDate::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property array $additionalMetaData
 * @property SubscriptionOrderAddress $address
 * @property SubscriptionOrderApplication $application
 * @property array $legacyCustomData
 * @property int $customerId
 * @property string $ipAddress
 * @property SubscriptionOrderItem[] $items
 * @property SubscriptionOrderMembershipCard $membershipCard
 * @property SubscriptionOrderPaymentType[] $paymentTypes
 * @property string $subscriptionId
 * @property string $userAgent
 * @property SubscriptionOrderVoucher $voucher
 * @property SubscriptionOrderCarrier $carrier
 * @property string $referenceKey External reference set by the client to integrate 3rd party system
 */
class SubscriptionOrder extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'address' => SubscriptionOrderAddress::class,
        'application' => SubscriptionOrderApplication::class,
        'membershipCard' => SubscriptionOrderMembershipCard::class,
        'voucher' => SubscriptionOrderVoucher::class,
        'carrier' => SubscriptionOrderCarrier::class,
    ];

    protected $collectionClassMap = [
        'items' => SubscriptionOrderItem::class,
        'paymentTypes' => SubscriptionOrderPaymentType::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

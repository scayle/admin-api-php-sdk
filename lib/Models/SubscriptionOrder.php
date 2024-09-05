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

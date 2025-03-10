<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property array<mixed> $additionalMetaData
 * @property SubscriptionOrderAddress $address
 * @property SubscriptionOrderApplication $application
 * @property array<mixed> $legacyCustomData
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
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'address' => SubscriptionOrderAddress::class,
        'application' => SubscriptionOrderApplication::class,
        'membershipCard' => SubscriptionOrderMembershipCard::class,
        'voucher' => SubscriptionOrderVoucher::class,
        'carrier' => SubscriptionOrderCarrier::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'items' => SubscriptionOrderItem::class,
        'paymentTypes' => SubscriptionOrderPaymentType::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}

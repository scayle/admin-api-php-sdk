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
 * @property int $id The ID of the order created
 * @property OrderAddress $address Billing and Shipping address of the customer
 * @property string $basketKey A key that uniquely identifies customer's cart
 * @property string $campaignKey Reference to the campaign applied to this order
 * @property string $confirmedAt Timestamp when the order was confirmed
 * @property OrderContact[] $contacts Collection of contacts
 * @property OrderCost $cost Total cost of the order that includes tax, VAT, etc
 * @property string $currencyCode ISO 4217 currency code
 * @property Customer $customer Details about the customer account
 * @property ShopCountry $shopCountry Country of the shop as ISO 3166 alpha 2 country code
 * @property string $invoicedAt Timestamp when the invoice is sent
 * @property string $createdAt Timestamp when the order is created
 * @property string $updatedAt Timestamp when the order is updated
 * @property OrderItem[] $items Collection of items ordered
 * @property array<mixed> $legacyCustomData Custom data added to the order (legacy feature)
 * @property OrderMembershipDiscount $membershipDiscount Membership discount information
 * @property OrderPackage[] $packages Details for the package(s) part of the order
 * @property OrderPayment[] $payment Payment details
 * @property OrderPromotion[] $promotion Order promotions
 * @property string $publicKey Public reference set by the client to display to customers in account areas and transactional emails.
 * @property string $referenceKey External order reference set by the client to integrate a third party system.
 * @property OrderShipping $shipping Shipping details
 * @property string $status Status of the order, e.g. invoice_completed
 * @property OrderDetailedStatus $detailedStatus
 * @property OrderVoucher[] $vouchers Applicable voucher and its details
 * @property OrderVoucher $voucher Applicable voucher and its details
 * @property OrderLoyaltyCard $loyaltyCard
 */
class Order extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'shipping' => OrderShipping::class,
        'customer' => Customer::class,
        'cost' => OrderCost::class,
        'address' => OrderAddress::class,
        'membershipDiscount' => OrderMembershipDiscount::class,
        'shopCountry' => ShopCountry::class,
        'loyaltyCard' => OrderLoyaltyCard::class,
        'detailedStatus' => OrderDetailedStatus::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'vouchers' => OrderVoucher::class,
        'payment' => OrderPayment::class,
        'items' => OrderItem::class,
        'contacts' => OrderContact::class,
        'packages' => OrderPackage::class,
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

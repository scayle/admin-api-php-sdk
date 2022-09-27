<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the order created
 * @property OrderAddress $address Billing and Shipping address of the customer
 * @property string $basketKey A key that uniquely identifies customer's cart
 * @property string $confirmedAt Timestamp when the order was confirmed
 * @property OrderCost $cost Total cost of the order that includes tax, VAT, etc
 * @property string $currencyCode ISO 4217 currency code
 * @property Customer $customer Details about the customer account
 * @property ShopCountry $shopCountry Country of the shop as ISO 3166 alpha 2 country code
 * @property string $invoicedAt Timestamp when the invoice is sent
 * @property string $createdAt Timestamp when the order is created
 * @property string $updatedAt Timestamp when the order is updated
 * @property OrderItem[] $items Collection of items ordered
 * @property array $legacyCustomData Custom data added to the order (legacy feature)
 * @property OrderPackage[] $packages Details for the package(s) part of the order
 * @property OrderPayment[] $payment Payment details
 * @property string $publicKey Public reference set by the client to display to customers in account areas and transactional emails.
 * @property string $referenceKey External order reference set by the client to integrate a third party system.
 * @property OrderShipping $shipping Shipping details
 * @property string $status Status of the order e.g: invoice_completed
 * @property OrderVoucher[] $vouchers Applicable voucher and its details
 * @property string $campaignKey Reference to the campaign applied to this order
 * @property OrderLoyaltyCard $loyaltyCard
 */
class Order extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'shipping' => \AboutYou\Cloud\AdminApi\Models\OrderShipping::class,
        'customer' => \AboutYou\Cloud\AdminApi\Models\Customer::class,
        'cost' => \AboutYou\Cloud\AdminApi\Models\OrderCost::class,
        'address' => \AboutYou\Cloud\AdminApi\Models\OrderAddress::class,
        'shopCountry' => \AboutYou\Cloud\AdminApi\Models\ShopCountry::class,
        'loyaltyCard' => \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class,
    ];

    protected $collectionClassMap = [
        'vouchers' => \AboutYou\Cloud\AdminApi\Models\OrderVoucher::class,
        'payment' => \AboutYou\Cloud\AdminApi\Models\OrderPayment::class,
        'items' => \AboutYou\Cloud\AdminApi\Models\OrderItem::class,
        'packages' => \AboutYou\Cloud\AdminApi\Models\OrderPackage::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

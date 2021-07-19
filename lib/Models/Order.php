<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property OrderAddress $address
 * @property string $basketKey
 * @property string $confirmedAt
 * @property OrderCost $cost
 * @property string $currencyCode
 * @property OrderCustomer $customer
 * @property string $invoicedAt
 * @property OrderItem[] $items
 * @property array $legacyCustomData
 * @property OrderPackage[] $packages
 * @property OrderPayment[] $payment
 * @property string $publicKey Public reference set by the client to display to customers in account areas and transactional emails
 * @property string $referenceKey External order reference set by the client to integrate a 3rd party system
 * @property OrderShipping $shipping
 * @property string $status
 * @property OrderVoucher[] $vouchers
 */
class Order extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'shipping' => \AboutYou\Cloud\AdminApi\Models\OrderShipping::class,
        'customer' => \AboutYou\Cloud\AdminApi\Models\OrderCustomer::class,
        'cost' => \AboutYou\Cloud\AdminApi\Models\OrderCost::class,
        'address' => \AboutYou\Cloud\AdminApi\Models\OrderAddress::class,
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

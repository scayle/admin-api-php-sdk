<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Customer;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Invoice;
use AboutYou\Cloud\AdminApi\Models\Order;
use AboutYou\Cloud\AdminApi\Models\OrderAddress;
use AboutYou\Cloud\AdminApi\Models\OrderCollection;
use AboutYou\Cloud\AdminApi\Models\OrderContact;
use AboutYou\Cloud\AdminApi\Models\OrderCost;
use AboutYou\Cloud\AdminApi\Models\OrderDetailedStatus;
use AboutYou\Cloud\AdminApi\Models\OrderInvoice;
use AboutYou\Cloud\AdminApi\Models\OrderInvoiceCollection;
use AboutYou\Cloud\AdminApi\Models\OrderItem;
use AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard;
use AboutYou\Cloud\AdminApi\Models\OrderMembershipDiscount;
use AboutYou\Cloud\AdminApi\Models\OrderPackage;
use AboutYou\Cloud\AdminApi\Models\OrderPayment;
use AboutYou\Cloud\AdminApi\Models\OrderReferenceKey;
use AboutYou\Cloud\AdminApi\Models\OrderShipping;
use AboutYou\Cloud\AdminApi\Models\OrderStatus;
use AboutYou\Cloud\AdminApi\Models\OrderVoucher;
use AboutYou\Cloud\AdminApi\Models\ShopCountry;
use AboutYou\Cloud\AdminApi\Models\SubscriptionOrder;

/**
 * @internal
 */
final class OrderTest extends BaseApiTestCase
{
    public function testGet()
    {
        $responseEntity = $this->api->orders->get('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('OrderGetResponse.json');
        self::assertInstanceOf(Order::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->orders->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('OrderAllResponse.json');
        self::assertInstanceOf(OrderCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Order::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'vouchers', OrderVoucher::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shipping', OrderShipping::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'payment', OrderPayment::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'items', OrderItem::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'customer', Customer::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', OrderContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'cost', OrderCost::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'address', OrderAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'membershipDiscount', OrderMembershipDiscount::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'packages', OrderPackage::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shopCountry', ShopCountry::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'loyaltyCard', OrderLoyaltyCard::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'detailedStatus', OrderDetailedStatus::class);
        }
    }

    public function testUpdateReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('OrderUpdateReferenceKeyRequest.json');

        $requestEntity = new OrderReferenceKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->orders->updateReferenceKey('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('OrderUpdateReferenceKeyResponse.json');
        self::assertInstanceOf(Order::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('OrderCreateRequest.json');

        $requestEntity = new Order($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->orders->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('OrderCreateResponse.json');
        self::assertInstanceOf(Order::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->orders->delete('acme', 'acme', Identifier::fromId(1), []);
    }

    public function testGetStatus()
    {
        $responseEntity = $this->api->orders->getStatus('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('OrderGetStatusResponse.json');
        self::assertInstanceOf(OrderStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);
    }

    public function testCreateSubscriptionOrder()
    {
        $expectedRequestJson = $this->loadFixture('OrderCreateSubscriptionOrderRequest.json');

        $requestEntity = new SubscriptionOrder($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->orders->createSubscriptionOrder('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('OrderCreateSubscriptionOrderResponse.json');
        self::assertInstanceOf(Order::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);
    }

    public function testGetOrderInvoices()
    {
        $responseEntity = $this->api->orders->getOrderInvoices('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('OrderGetOrderInvoicesResponse.json');
        self::assertInstanceOf(OrderInvoiceCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'invoice', Invoice::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(OrderInvoice::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'vouchers', OrderVoucher::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shipping', OrderShipping::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'payment', OrderPayment::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'items', OrderItem::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'customer', Customer::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', OrderContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'cost', OrderCost::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'address', OrderAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'membershipDiscount', OrderMembershipDiscount::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'packages', OrderPackage::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shopCountry', ShopCountry::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'loyaltyCard', OrderLoyaltyCard::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'detailedStatus', OrderDetailedStatus::class);
        }
    }

    public function testGetOrderInvoice()
    {
        $responseEntity = $this->api->orders->getOrderInvoice('acme', 'acme', Identifier::fromId(1), 1, []);

        self::assertIsString($responseEntity);
    }
}

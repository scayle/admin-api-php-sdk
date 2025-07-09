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

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Models\Customer;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Invoice;
use Scayle\Cloud\AdminApi\Models\Order;
use Scayle\Cloud\AdminApi\Models\OrderAddress;
use Scayle\Cloud\AdminApi\Models\OrderCollection;
use Scayle\Cloud\AdminApi\Models\OrderContact;
use Scayle\Cloud\AdminApi\Models\OrderCost;
use Scayle\Cloud\AdminApi\Models\OrderDetailedStatus;
use Scayle\Cloud\AdminApi\Models\OrderInvoice;
use Scayle\Cloud\AdminApi\Models\OrderInvoiceCollection;
use Scayle\Cloud\AdminApi\Models\OrderItem;
use Scayle\Cloud\AdminApi\Models\OrderLoyaltyCard;
use Scayle\Cloud\AdminApi\Models\OrderMembershipDiscount;
use Scayle\Cloud\AdminApi\Models\OrderPackage;
use Scayle\Cloud\AdminApi\Models\OrderPayment;
use Scayle\Cloud\AdminApi\Models\OrderReferenceKey;
use Scayle\Cloud\AdminApi\Models\OrderShipping;
use Scayle\Cloud\AdminApi\Models\OrderStatus;
use Scayle\Cloud\AdminApi\Models\OrderVoucher;
use Scayle\Cloud\AdminApi\Models\ShopCountry;
use Scayle\Cloud\AdminApi\Models\SubscriptionOrder;

/**
 * @internal
 */
final class OrderTest extends BaseApiTestCase
{
    public function testGet(): void
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

    public function testAll(): void
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

    public function testUpdateReferenceKey(): void
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

    public function testCreate(): void
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

    public function testDelete(): void
    {
        $this->api->orders->delete('acme', 'acme', Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetStatus(): void
    {
        $responseEntity = $this->api->orders->getStatus('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('OrderGetStatusResponse.json');
        self::assertInstanceOf(OrderStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);



    }

    public function testCreateSubscriptionOrder(): void
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

    public function testGetOrderInvoices(): void
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

    public function testGetOrderInvoice(): void
    {
        $responseEntity = $this->api->orders->getOrderInvoice('acme', 'acme', Identifier::fromId(1), 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertIsString($responseEntity);



    }

    public function testCreateOrUpdateLegacyCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('OrderCreateOrUpdateLegacyCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $this->api->orders->createOrUpdateLegacyCustomData('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testTriggerManualCapture(): void
    {
        $responseEntity = $this->api->orders->triggerManualCapture('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('OrderTriggerManualCaptureResponse.json');
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
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class OrderTest extends BaseApiTestCase
{
    public function testGet()
    {
        $responseEntity = $this->api->orders->get('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('OrderGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Order::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', \AboutYou\Cloud\AdminApi\Models\OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', \AboutYou\Cloud\AdminApi\Models\OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', \AboutYou\Cloud\AdminApi\Models\OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', \AboutYou\Cloud\AdminApi\Models\OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', \AboutYou\Cloud\AdminApi\Models\Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', \AboutYou\Cloud\AdminApi\Models\OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatus::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->orders->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('OrderAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\OrderCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', \AboutYou\Cloud\AdminApi\Models\OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', \AboutYou\Cloud\AdminApi\Models\OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', \AboutYou\Cloud\AdminApi\Models\OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', \AboutYou\Cloud\AdminApi\Models\OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', \AboutYou\Cloud\AdminApi\Models\Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', \AboutYou\Cloud\AdminApi\Models\OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatus::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Order::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'vouchers', \AboutYou\Cloud\AdminApi\Models\OrderVoucher::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shipping', \AboutYou\Cloud\AdminApi\Models\OrderShipping::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'payment', \AboutYou\Cloud\AdminApi\Models\OrderPayment::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'items', \AboutYou\Cloud\AdminApi\Models\OrderItem::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'customer', \AboutYou\Cloud\AdminApi\Models\Customer::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\OrderContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'membershipDiscount', \AboutYou\Cloud\AdminApi\Models\OrderMembershipDiscount::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'detailedStatus', \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatus::class);
        }
    }

    public function testUpdateReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('OrderUpdateReferenceKeyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\OrderReferenceKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->orders->updateReferenceKey('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('OrderUpdateReferenceKeyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Order::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', \AboutYou\Cloud\AdminApi\Models\OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', \AboutYou\Cloud\AdminApi\Models\OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', \AboutYou\Cloud\AdminApi\Models\OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', \AboutYou\Cloud\AdminApi\Models\OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', \AboutYou\Cloud\AdminApi\Models\Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', \AboutYou\Cloud\AdminApi\Models\OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatus::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('OrderCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Order($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->orders->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('OrderCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Order::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', \AboutYou\Cloud\AdminApi\Models\OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', \AboutYou\Cloud\AdminApi\Models\OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', \AboutYou\Cloud\AdminApi\Models\OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', \AboutYou\Cloud\AdminApi\Models\OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', \AboutYou\Cloud\AdminApi\Models\Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', \AboutYou\Cloud\AdminApi\Models\OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatus::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->orders->delete('acme', 'acme', Identifier::fromId(1), []);
    }

    public function testGetStatus()
    {
        $responseEntity = $this->api->orders->getStatus('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('OrderGetStatusResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\OrderStatus::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', \AboutYou\Cloud\AdminApi\Models\OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', \AboutYou\Cloud\AdminApi\Models\OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', \AboutYou\Cloud\AdminApi\Models\OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', \AboutYou\Cloud\AdminApi\Models\OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', \AboutYou\Cloud\AdminApi\Models\Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', \AboutYou\Cloud\AdminApi\Models\OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', \AboutYou\Cloud\AdminApi\Models\OrderDetailedStatus::class);
    }
}

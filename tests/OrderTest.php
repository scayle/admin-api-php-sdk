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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', \AboutYou\Cloud\AdminApi\Models\OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', \AboutYou\Cloud\AdminApi\Models\OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', \AboutYou\Cloud\AdminApi\Models\OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', \AboutYou\Cloud\AdminApi\Models\OrderLoyaltyCard::class);
    }
}

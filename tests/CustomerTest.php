<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class CustomerTest extends BaseApiTestCase
{
    public function testGet()
    {
        $responseEntity = $this->api->customers->Get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Customer($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->Create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Customer($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->Update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateReferenceKeyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerReferenceKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->UpdateReferenceKey('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateReferenceKeyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testAnonymize()
    {
        $responseEntity = $this->api->customers->Anonymize(Identifier::fromId(1), []);
    }

    public function testGetStatus()
    {
        $responseEntity = $this->api->customers->GetStatus(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetStatusResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerStatus::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateStatus()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateStatusRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerStatus($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->UpdateStatus(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateStatusResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerStatus::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }
}

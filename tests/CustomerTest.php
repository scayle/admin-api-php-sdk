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

    public function testGetAddresses()
    {
        $responseEntity = $this->api->customers->GetAddresses(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetAddressesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
        }
    }

    public function testGetAddress()
    {
        $responseEntity = $this->api->customers->GetAddress(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testCreateAddress()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateAddressRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerAddress($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->CreateAddress(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateAddress()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateAddressRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerAddress($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->UpdateAddress(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateAddressReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateAddressReferenceKeyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerAddressReferenceKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->UpdateAddressReferenceKey(Identifier::fromId(1), '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateAddressReferenceKeyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testAnonymizeAddress()
    {
        $responseEntity = $this->api->customers->AnonymizeAddress(Identifier::fromId(1), Identifier::fromId(1), []);
    }
}

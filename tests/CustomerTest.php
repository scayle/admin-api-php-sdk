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
        $responseEntity = $this->api->customers->Get('1', '1', Identifier::fromId(1), []);

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

        $responseEntity = $this->api->customers->Create('1', '1', $requestEntity, []);

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

        $responseEntity = $this->api->customers->Update('1', '1', Identifier::fromId(1), $requestEntity, []);

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

        $responseEntity = $this->api->customers->UpdateReferenceKey('1', '1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateReferenceKeyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testAnonymize()
    {
        $responseEntity = $this->api->customers->Anonymize('1', '1', Identifier::fromId(1), []);
    }

    public function testGetStatus()
    {
        $responseEntity = $this->api->customers->GetStatus('1', '1', Identifier::fromId(1), []);

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

        $responseEntity = $this->api->customers->UpdateStatus('1', '1', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateStatusResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerStatus::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testGetAddresses()
    {
        $responseEntity = $this->api->customers->GetAddresses('1', '1', Identifier::fromId(1), []);

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
        $responseEntity = $this->api->customers->GetAddress('1', '1', Identifier::fromId(1), Identifier::fromId(1), []);

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

        $responseEntity = $this->api->customers->CreateAddress('1', '1', Identifier::fromId(1), $requestEntity, []);

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

        $responseEntity = $this->api->customers->UpdateAddress('1', '1', Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

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

        $responseEntity = $this->api->customers->UpdateAddressReferenceKey('1', '1', Identifier::fromId(1), '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateAddressReferenceKeyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testAnonymizeAddress()
    {
        $responseEntity = $this->api->customers->AnonymizeAddress('1', '1', Identifier::fromId(1), Identifier::fromId(1), []);
    }

    public function testResetPassword()
    {
        $responseEntity = $this->api->customers->ResetPassword('1', '1', Identifier::fromId(1), []);
    }

    public function testAddGroups()
    {
        $expectedRequestJson = $this->loadFixture('CustomerAddGroupsRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerGroup($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->AddGroups('1', '1', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerAddGroupsResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testDeleteGroup()
    {
        $responseEntity = $this->api->customers->DeleteGroup('1', '1', Identifier::fromId(1), '1', []);
    }
}

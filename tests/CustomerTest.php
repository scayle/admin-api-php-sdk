<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class CustomerTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->customers->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('CustomerAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->customers->get('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Customer($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Customer($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->update('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateReferenceKeyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerReferenceKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateReferenceKey('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateReferenceKeyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testAnonymize()
    {
        $responseEntity = $this->api->customers->anonymize('acme', 'acme', Identifier::fromId(1), []);
    }

    public function testGetStatus()
    {
        $responseEntity = $this->api->customers->getStatus('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetStatusResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerStatus::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateStatus()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateStatusRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerStatus($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateStatus('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateStatusResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerStatus::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testGetAddresses()
    {
        $responseEntity = $this->api->customers->getAddresses('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetAddressesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

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
        $responseEntity = $this->api->customers->getAddress('acme', 'acme', Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testCreateAddress()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateAddressRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerAddress($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->createAddress('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateAddress()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateAddressRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerAddress($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateAddress('acme', 'acme', Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateAddressReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateAddressReferenceKeyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerAddressReferenceKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateAddressReferenceKey('acme', 'acme', Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateAddressReferenceKeyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testAnonymizeAddress()
    {
        $responseEntity = $this->api->customers->anonymizeAddress('acme', 'acme', Identifier::fromId(1), Identifier::fromId(1), []);
    }

    public function testAnonymizeAddressByIdentifier()
    {
        $responseEntity = $this->api->customers->anonymizeAddressByIdentifier('acme', 'acme', Identifier::fromId(1), []);
    }

    public function testResetPassword()
    {
        $responseEntity = $this->api->customers->resetPassword('acme', 'acme', Identifier::fromId(1), []);
    }

    public function testAddGroups()
    {
        $expectedRequestJson = $this->loadFixture('CustomerAddGroupsRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerGroup($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->addGroups('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerAddGroupsResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Customer::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testCreateMembership()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateMembershipRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerMembership($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->createMembership('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateMembershipResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerMembership::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testUpdateMembership()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateMembershipRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomerMembership($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateMembership('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateMembershipResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerMembership::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    public function testGetMemberships()
    {
        $responseEntity = $this->api->customers->getMemberships('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetMembershipsResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerMembershipCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomerMembership::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'status', \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'addresses', \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
        }
    }

    public function testDeleteMembership()
    {
        $responseEntity = $this->api->customers->deleteMembership('acme', 'acme', 1, []);
    }

    public function testDeleteGroup()
    {
        $responseEntity = $this->api->customers->deleteGroup('acme', 'acme', Identifier::fromId(1), 'acme', []);
    }
}

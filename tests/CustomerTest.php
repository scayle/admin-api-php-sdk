<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Customer;
use AboutYou\Cloud\AdminApi\Models\CustomerAddress;
use AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection;
use AboutYou\Cloud\AdminApi\Models\CustomerAddressCollectionPoint;
use AboutYou\Cloud\AdminApi\Models\CustomerAddressDefault;
use AboutYou\Cloud\AdminApi\Models\CustomerAddressRecipient;
use AboutYou\Cloud\AdminApi\Models\CustomerAddressReferenceKey;
use AboutYou\Cloud\AdminApi\Models\CustomerCollection;
use AboutYou\Cloud\AdminApi\Models\CustomerGroup;
use AboutYou\Cloud\AdminApi\Models\CustomerIdentityProvider;
use AboutYou\Cloud\AdminApi\Models\CustomerMembership;
use AboutYou\Cloud\AdminApi\Models\CustomerMembershipCollection;
use AboutYou\Cloud\AdminApi\Models\CustomerPassword;
use AboutYou\Cloud\AdminApi\Models\CustomerPasswordHash;
use AboutYou\Cloud\AdminApi\Models\CustomerReferenceKey;
use AboutYou\Cloud\AdminApi\Models\CustomerStatus;
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
        self::assertInstanceOf(CustomerCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Customer::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'status', CustomerStatus::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'addresses', CustomerAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'identities', CustomerIdentityProvider::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->customers->get('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetResponse.json');
        self::assertInstanceOf(Customer::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateRequest.json');

        $requestEntity = new Customer($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateResponse.json');
        self::assertInstanceOf(Customer::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateRequest.json');

        $requestEntity = new Customer($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->update('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateResponse.json');
        self::assertInstanceOf(Customer::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);
    }

    public function testUpdateReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateReferenceKeyRequest.json');

        $requestEntity = new CustomerReferenceKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateReferenceKey('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateReferenceKeyResponse.json');
        self::assertInstanceOf(Customer::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);
    }

    public function testAnonymize()
    {
        $responseEntity = $this->api->customers->anonymize('acme', 'acme', Identifier::fromId(1), []);
    }

    public function testSetPassword()
    {
        $expectedRequestJson = $this->loadFixture('CustomerSetPasswordRequest.json');

        $requestEntity = new CustomerPassword($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->setPassword('acme', 'acme', Identifier::fromId(1), $requestEntity, []);
    }

    public function testSetPasswordHash()
    {
        $expectedRequestJson = $this->loadFixture('CustomerSetPasswordHashRequest.json');

        $requestEntity = new CustomerPasswordHash($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->setPasswordHash('acme', 'acme', Identifier::fromId(1), $requestEntity, []);
    }

    public function testGetStatus()
    {
        $responseEntity = $this->api->customers->getStatus('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetStatusResponse.json');
        self::assertInstanceOf(CustomerStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdateStatus()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateStatusRequest.json');

        $requestEntity = new CustomerStatus($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateStatus('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateStatusResponse.json');
        self::assertInstanceOf(CustomerStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGetAddresses()
    {
        $responseEntity = $this->api->customers->getAddresses('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetAddressesResponse.json');
        self::assertInstanceOf(CustomerAddressCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'collectionPoint', CustomerAddressCollectionPoint::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'isDefault', CustomerAddressDefault::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'recipient', CustomerAddressRecipient::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(CustomerAddress::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'status', CustomerStatus::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'addresses', CustomerAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'identities', CustomerIdentityProvider::class);
        }
    }

    public function testGetAddress()
    {
        $responseEntity = $this->api->customers->getAddress('acme', 'acme', Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetAddressResponse.json');
        self::assertInstanceOf(CustomerAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'collectionPoint', CustomerAddressCollectionPoint::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'isDefault', CustomerAddressDefault::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'recipient', CustomerAddressRecipient::class);
    }

    public function testCreateAddress()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateAddressRequest.json');

        $requestEntity = new CustomerAddress($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->createAddress('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateAddressResponse.json');
        self::assertInstanceOf(CustomerAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'collectionPoint', CustomerAddressCollectionPoint::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'isDefault', CustomerAddressDefault::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'recipient', CustomerAddressRecipient::class);
    }

    public function testUpdateAddress()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateAddressRequest.json');

        $requestEntity = new CustomerAddress($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateAddress('acme', 'acme', Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateAddressResponse.json');
        self::assertInstanceOf(CustomerAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'collectionPoint', CustomerAddressCollectionPoint::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'isDefault', CustomerAddressDefault::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'recipient', CustomerAddressRecipient::class);
    }

    public function testUpdateAddressReferenceKey()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateAddressReferenceKeyRequest.json');

        $requestEntity = new CustomerAddressReferenceKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateAddressReferenceKey('acme', 'acme', Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateAddressReferenceKeyResponse.json');
        self::assertInstanceOf(CustomerAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'collectionPoint', CustomerAddressCollectionPoint::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'isDefault', CustomerAddressDefault::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'recipient', CustomerAddressRecipient::class);
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

        $requestEntity = new CustomerGroup($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->addGroups('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerAddGroupsResponse.json');
        self::assertInstanceOf(Customer::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);
    }

    public function testCreateMembership()
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateMembershipRequest.json');

        $requestEntity = new CustomerMembership($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->createMembership('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateMembershipResponse.json');
        self::assertInstanceOf(CustomerMembership::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdateMembership()
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateMembershipRequest.json');

        $requestEntity = new CustomerMembership($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateMembership('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateMembershipResponse.json');
        self::assertInstanceOf(CustomerMembership::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGetMemberships()
    {
        $responseEntity = $this->api->customers->getMemberships('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetMembershipsResponse.json');
        self::assertInstanceOf(CustomerMembershipCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(CustomerMembership::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'status', CustomerStatus::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'addresses', CustomerAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'identities', CustomerIdentityProvider::class);
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

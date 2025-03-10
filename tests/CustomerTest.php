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
use Scayle\Cloud\AdminApi\Models\CustomerAddress;
use Scayle\Cloud\AdminApi\Models\CustomerAddressCollection;
use Scayle\Cloud\AdminApi\Models\CustomerAddressCollectionPoint;
use Scayle\Cloud\AdminApi\Models\CustomerAddressDefault;
use Scayle\Cloud\AdminApi\Models\CustomerAddressRecipient;
use Scayle\Cloud\AdminApi\Models\CustomerAddressReferenceKey;
use Scayle\Cloud\AdminApi\Models\CustomerCollection;
use Scayle\Cloud\AdminApi\Models\CustomerGroup;
use Scayle\Cloud\AdminApi\Models\CustomerIdentityProvider;
use Scayle\Cloud\AdminApi\Models\CustomerMembership;
use Scayle\Cloud\AdminApi\Models\CustomerMembershipCollection;
use Scayle\Cloud\AdminApi\Models\CustomerPassword;
use Scayle\Cloud\AdminApi\Models\CustomerPasswordHash;
use Scayle\Cloud\AdminApi\Models\CustomerReferenceKey;
use Scayle\Cloud\AdminApi\Models\CustomerStatus;
use Scayle\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class CustomerTest extends BaseApiTestCase
{
    public function testAll(): void
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

    public function testGet(): void
    {
        $responseEntity = $this->api->customers->get('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetResponse.json');
        self::assertInstanceOf(Customer::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);



    }

    public function testCreate(): void
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

    public function testUpdate(): void
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

    public function testUpdateReferenceKey(): void
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

    public function testCreateOrUpdateLegacyCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateOrUpdateLegacyCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->customers->createOrUpdateLegacyCustomData('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateOrUpdateLegacyCustomDataResponse.json');
        self::assertInstanceOf(Customer::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'status', CustomerStatus::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'addresses', CustomerAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'identities', CustomerIdentityProvider::class);



    }

    public function testAnonymize(): void
    {
        $this->api->customers->anonymize('acme', 'acme', Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testSetPassword(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerSetPasswordRequest.json');

        $requestEntity = new CustomerPassword($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $this->api->customers->setPassword('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testSetPasswordHash(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerSetPasswordHashRequest.json');

        $requestEntity = new CustomerPasswordHash($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $this->api->customers->setPasswordHash('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetStatus(): void
    {
        $responseEntity = $this->api->customers->getStatus('acme', 'acme', Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetStatusResponse.json');
        self::assertInstanceOf(CustomerStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateStatus(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateStatusRequest.json');

        $requestEntity = new CustomerStatus($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateStatus('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateStatusResponse.json');
        self::assertInstanceOf(CustomerStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGetAddresses(): void
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

    public function testGetAddress(): void
    {
        $responseEntity = $this->api->customers->getAddress('acme', 'acme', Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CustomerGetAddressResponse.json');
        self::assertInstanceOf(CustomerAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'collectionPoint', CustomerAddressCollectionPoint::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'isDefault', CustomerAddressDefault::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'recipient', CustomerAddressRecipient::class);



    }

    public function testCreateAddress(): void
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

    public function testUpdateAddress(): void
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

    public function testUpdateAddressReferenceKey(): void
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

    public function testAnonymizeAddress(): void
    {
        $this->api->customers->anonymizeAddress('acme', 'acme', Identifier::fromId(1), Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAnonymizeAddressByIdentifier(): void
    {
        $this->api->customers->anonymizeAddressByIdentifier('acme', 'acme', Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testResetPassword(): void
    {
        $this->api->customers->resetPassword('acme', 'acme', Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAddGroups(): void
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

    public function testCreateMembership(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerCreateMembershipRequest.json');

        $requestEntity = new CustomerMembership($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->createMembership('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerCreateMembershipResponse.json');
        self::assertInstanceOf(CustomerMembership::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateMembership(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerUpdateMembershipRequest.json');

        $requestEntity = new CustomerMembership($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customers->updateMembership('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerUpdateMembershipResponse.json');
        self::assertInstanceOf(CustomerMembership::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGetMemberships(): void
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

    public function testDeleteMembership(): void
    {
        $this->api->customers->deleteMembership('acme', 'acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testDeleteGroup(): void
    {
        $this->api->customers->deleteGroup('acme', 'acme', Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

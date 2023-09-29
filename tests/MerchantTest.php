<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class MerchantTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->merchants->all([]);

        $expectedResponseJson = $this->loadFixture('MerchantAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->merchants->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Merchant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Merchant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testAllContacts()
    {
        $responseEntity = $this->api->merchants->allContacts(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllContactsResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantContactCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantContact::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
        }
    }

    public function testGetContact()
    {
        $responseEntity = $this->api->merchants->getContact(Identifier::fromId(1), 1, []);

        $expectedResponseJson = $this->loadFixture('MerchantGetContactResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantContact::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testCreateContact()
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateContactRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\MerchantContact($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->createContact(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateContactResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantContact::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testUpdateContact()
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateContactRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\MerchantContact($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->updateContact(Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateContactResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantContact::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testDeleteContact()
    {
        $responseEntity = $this->api->merchants->deleteContact(Identifier::fromId(1), 1, []);
    }

    public function testAllReturnAddresses()
    {
        $responseEntity = $this->api->merchants->allReturnAddresses(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllReturnAddressesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantReturnAddressCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
        }
    }

    public function testGetReturnAddress()
    {
        $responseEntity = $this->api->merchants->getReturnAddress(Identifier::fromId(1), 1, []);

        $expectedResponseJson = $this->loadFixture('MerchantGetReturnAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testCreateReturnAddress()
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateReturnAddressRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->createReturnAddress(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateReturnAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testUpdateReturnAddress()
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateReturnAddressRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->updateReturnAddress(Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateReturnAddressResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', \AboutYou\Cloud\AdminApi\Models\MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class);
    }

    public function testDeleteReturnAddress()
    {
        $responseEntity = $this->api->merchants->deleteReturnAddress(Identifier::fromId(1), 1, []);
    }

    public function testAttachCarrier()
    {
        $responseEntity = $this->api->merchants->attachCarrier(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);
    }

    public function testDetachCarrier()
    {
        $responseEntity = $this->api->merchants->detachCarrier(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);
    }
}

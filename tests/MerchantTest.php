<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Merchant;
use AboutYou\Cloud\AdminApi\Models\MerchantCarrier;
use AboutYou\Cloud\AdminApi\Models\MerchantCollection;
use AboutYou\Cloud\AdminApi\Models\MerchantContact;
use AboutYou\Cloud\AdminApi\Models\MerchantContactCollection;
use AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress;
use AboutYou\Cloud\AdminApi\Models\MerchantReturnAddressCollection;
use AboutYou\Cloud\AdminApi\Models\Warehouse;
use AboutYou\Cloud\AdminApi\Models\WarehouseCollection;

/**
 * @internal
 */
final class MerchantTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->merchants->all([]);

        $expectedResponseJson = $this->loadFixture('MerchantAllResponse.json');
        self::assertInstanceOf(MerchantCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Merchant::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', Warehouse::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->merchants->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantGetResponse.json');
        self::assertInstanceOf(Merchant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateRequest.json');

        $requestEntity = new Merchant($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateResponse.json');
        self::assertInstanceOf(Merchant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateRequest.json');

        $requestEntity = new Merchant($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateResponse.json');
        self::assertInstanceOf(Merchant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testAllContacts()
    {
        $responseEntity = $this->api->merchants->allContacts(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllContactsResponse.json');
        self::assertInstanceOf(MerchantContactCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(MerchantContact::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', Warehouse::class);
        }
    }

    public function testGetContact()
    {
        $responseEntity = $this->api->merchants->getContact(Identifier::fromId(1), 1, []);

        $expectedResponseJson = $this->loadFixture('MerchantGetContactResponse.json');
        self::assertInstanceOf(MerchantContact::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testCreateContact()
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateContactRequest.json');

        $requestEntity = new MerchantContact($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->createContact(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateContactResponse.json');
        self::assertInstanceOf(MerchantContact::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testUpdateContact()
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateContactRequest.json');

        $requestEntity = new MerchantContact($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->updateContact(Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateContactResponse.json');
        self::assertInstanceOf(MerchantContact::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testDeleteContact()
    {
        $responseEntity = $this->api->merchants->deleteContact(Identifier::fromId(1), 1, []);
    }

    public function testAllReturnAddresses()
    {
        $responseEntity = $this->api->merchants->allReturnAddresses(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllReturnAddressesResponse.json');
        self::assertInstanceOf(MerchantReturnAddressCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(MerchantReturnAddress::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', Warehouse::class);
        }
    }

    public function testGetReturnAddress()
    {
        $responseEntity = $this->api->merchants->getReturnAddress(Identifier::fromId(1), 1, []);

        $expectedResponseJson = $this->loadFixture('MerchantGetReturnAddressResponse.json');
        self::assertInstanceOf(MerchantReturnAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testCreateReturnAddress()
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateReturnAddressRequest.json');

        $requestEntity = new MerchantReturnAddress($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->createReturnAddress(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateReturnAddressResponse.json');
        self::assertInstanceOf(MerchantReturnAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
    }

    public function testUpdateReturnAddress()
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateReturnAddressRequest.json');

        $requestEntity = new MerchantReturnAddress($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->updateReturnAddress(Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateReturnAddressResponse.json');
        self::assertInstanceOf(MerchantReturnAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);
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

    public function testAllWarehouses()
    {
        $responseEntity = $this->api->merchants->allWarehouses(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllWarehousesResponse.json');
        self::assertInstanceOf(WarehouseCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', Warehouse::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Warehouse::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', Warehouse::class);
        }
    }

    public function testAttachWarehouse()
    {
        $responseEntity = $this->api->merchants->attachWarehouse(Identifier::fromId(1), Identifier::fromId(1), []);
    }

    public function testDetachWarehouse()
    {
        $responseEntity = $this->api->merchants->detachWarehouse(Identifier::fromId(1), Identifier::fromId(1), []);
    }
}

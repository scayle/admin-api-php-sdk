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

use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Merchant;
use Scayle\Cloud\AdminApi\Models\MerchantCarrier;
use Scayle\Cloud\AdminApi\Models\MerchantCollection;
use Scayle\Cloud\AdminApi\Models\MerchantContact;
use Scayle\Cloud\AdminApi\Models\MerchantContactCollection;
use Scayle\Cloud\AdminApi\Models\MerchantCreateOrUpdate;
use Scayle\Cloud\AdminApi\Models\MerchantReturnAddress;
use Scayle\Cloud\AdminApi\Models\MerchantReturnAddressCollection;
use Scayle\Cloud\AdminApi\Models\MerchantWarehouse;
use Scayle\Cloud\AdminApi\Models\Warehouse;
use Scayle\Cloud\AdminApi\Models\WarehouseCollection;
use Scayle\Cloud\AdminApi\Models\WarehouseShopCountry;

/**
 * @internal
 */
final class MerchantTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->merchants->all([]);

        $expectedResponseJson = $this->loadFixture('MerchantAllResponse.json');
        self::assertInstanceOf(MerchantCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', MerchantWarehouse::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Merchant::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', MerchantWarehouse::class);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->merchants->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantGetResponse.json');
        self::assertInstanceOf(Merchant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', MerchantContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'returnAddresses', MerchantReturnAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'carriers', MerchantCarrier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', MerchantWarehouse::class);



    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateRequest.json');

        $requestEntity = new MerchantCreateOrUpdate($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateResponse.json');
        self::assertInstanceOf(MerchantCreateOrUpdate::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateRequest.json');

        $requestEntity = new MerchantCreateOrUpdate($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateResponse.json');
        self::assertInstanceOf(MerchantCreateOrUpdate::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAllContacts(): void
    {
        $responseEntity = $this->api->merchants->allContacts(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllContactsResponse.json');
        self::assertInstanceOf(MerchantContactCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(MerchantContact::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', MerchantWarehouse::class);

        }
    }

    public function testGetContact(): void
    {
        $responseEntity = $this->api->merchants->getContact(Identifier::fromId(1), 1, []);

        $expectedResponseJson = $this->loadFixture('MerchantGetContactResponse.json');
        self::assertInstanceOf(MerchantContact::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreateContact(): void
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateContactRequest.json');

        $requestEntity = new MerchantContact($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->createContact(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateContactResponse.json');
        self::assertInstanceOf(MerchantContact::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateContact(): void
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateContactRequest.json');

        $requestEntity = new MerchantContact($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->updateContact(Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateContactResponse.json');
        self::assertInstanceOf(MerchantContact::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteContact(): void
    {
        $this->api->merchants->deleteContact(Identifier::fromId(1), 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAllReturnAddresses(): void
    {
        $responseEntity = $this->api->merchants->allReturnAddresses(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllReturnAddressesResponse.json');
        self::assertInstanceOf(MerchantReturnAddressCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(MerchantReturnAddress::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', MerchantWarehouse::class);

        }
    }

    public function testGetReturnAddress(): void
    {
        $responseEntity = $this->api->merchants->getReturnAddress(Identifier::fromId(1), 1, []);

        $expectedResponseJson = $this->loadFixture('MerchantGetReturnAddressResponse.json');
        self::assertInstanceOf(MerchantReturnAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreateReturnAddress(): void
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateReturnAddressRequest.json');

        $requestEntity = new MerchantReturnAddress($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->createReturnAddress(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateReturnAddressResponse.json');
        self::assertInstanceOf(MerchantReturnAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateReturnAddress(): void
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateReturnAddressRequest.json');

        $requestEntity = new MerchantReturnAddress($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->updateReturnAddress(Identifier::fromId(1), 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateReturnAddressResponse.json');
        self::assertInstanceOf(MerchantReturnAddress::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteReturnAddress(): void
    {
        $this->api->merchants->deleteReturnAddress(Identifier::fromId(1), 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAttachCarrier(): void
    {
        $this->api->merchants->attachCarrier(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testDetachCarrier(): void
    {
        $this->api->merchants->detachCarrier(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAllWarehouses(): void
    {
        $responseEntity = $this->api->merchants->allWarehouses(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantAllWarehousesResponse.json');
        self::assertInstanceOf(WarehouseCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchants', Merchant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountries', WarehouseShopCountry::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Warehouse::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'contacts', MerchantContact::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'returnAddresses', MerchantReturnAddress::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'carriers', MerchantCarrier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', MerchantWarehouse::class);

        }
    }

    public function testAttachWarehouse(): void
    {
        $this->api->merchants->attachWarehouse(Identifier::fromId(1), Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testDetachWarehouse(): void
    {
        $this->api->merchants->detachWarehouse(Identifier::fromId(1), Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

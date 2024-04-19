<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Merchant;
use AboutYou\Cloud\AdminApi\Models\Warehouse;
use AboutYou\Cloud\AdminApi\Models\WarehouseCollection;
use AboutYou\Cloud\AdminApi\Models\WarehouseShopCountry;

/**
 * @internal
 */
final class WarehouseTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->warehouses->all([]);

        $expectedResponseJson = $this->loadFixture('WarehouseAllResponse.json');
        self::assertInstanceOf(WarehouseCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchants', Merchant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountries', WarehouseShopCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Warehouse::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'merchants', Merchant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shopCountries', WarehouseShopCountry::class);
        }
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('WarehouseCreateRequest.json');

        $requestEntity = new Warehouse($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->warehouses->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WarehouseCreateResponse.json');
        self::assertInstanceOf(Warehouse::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchants', Merchant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountries', WarehouseShopCountry::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->warehouses->delete(Identifier::fromId(1), []);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class WarehouseTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->warehouses->all([]);

        $expectedResponseJson = $this->loadFixture('WarehouseAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\WarehouseCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchants', \AboutYou\Cloud\AdminApi\Models\Merchant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountries', \AboutYou\Cloud\AdminApi\Models\WarehouseShopCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Warehouse::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'merchants', \AboutYou\Cloud\AdminApi\Models\Merchant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shopCountries', \AboutYou\Cloud\AdminApi\Models\WarehouseShopCountry::class);
        }
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('WarehouseCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Warehouse($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->warehouses->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WarehouseCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Warehouse::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchants', \AboutYou\Cloud\AdminApi\Models\Merchant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountries', \AboutYou\Cloud\AdminApi\Models\WarehouseShopCountry::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->warehouses->delete(Identifier::fromId(1), []);
    }
}

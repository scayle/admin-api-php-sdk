<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\PackageGroup;
use AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse;

/**
 * @internal
 */
final class ShopCountryWarehouseTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryWarehouseCreateRequest.json');

        $requestEntity = new ShopCountryWarehouse($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryWarehouses->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryWarehouseCreateResponse.json');
        self::assertInstanceOf(ShopCountryWarehouse::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', PackageGroup::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryWarehouseUpdateRequest.json');

        $requestEntity = new ShopCountryWarehouse($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryWarehouses->update('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryWarehouseUpdateResponse.json');
        self::assertInstanceOf(ShopCountryWarehouse::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', PackageGroup::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCountryWarehouses->delete('acme', 'acme', Identifier::fromId(1), []);
    }
}

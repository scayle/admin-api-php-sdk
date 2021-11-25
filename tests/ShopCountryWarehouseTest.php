<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class ShopCountryWarehouseTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryWarehouseCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryWarehouses->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryWarehouseCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', \AboutYou\Cloud\AdminApi\Models\PackageGroup::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryWarehouseUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryWarehouses->update('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryWarehouseUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', \AboutYou\Cloud\AdminApi\Models\PackageGroup::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCountryWarehouses->delete('acme', 'acme', Identifier::fromId(1), []);
    }
}

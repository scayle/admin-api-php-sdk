<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class ShopWarehouseTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopWarehouseCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopWarehouse($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopWarehouses->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopWarehouseCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', \AboutYou\Cloud\AdminApi\Models\PackageGroup::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopWarehouseUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopWarehouse($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopWarehouses->update('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopWarehouseUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', \AboutYou\Cloud\AdminApi\Models\PackageGroup::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopWarehouses->delete('acme', 'acme', Identifier::fromId(1), []);
    }
}

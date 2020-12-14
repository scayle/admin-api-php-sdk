<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShopPropertyKeyTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopPropertyKeyCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopPropertyKeys->Create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopPropertyKeyCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopPropertyKeys->Get('1', []);

        $expectedResponseJson = $this->loadFixture('ShopPropertyKeyGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopPropertyKeys->All([]);

        $expectedResponseJson = $this->loadFixture('ShopPropertyKeyAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopPropertyKeyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class, $collectionEntity);
        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopPropertyKeyUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopPropertyKeys->Update('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopPropertyKeyUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopPropertyKeys->Delete('1', []);
    }
}

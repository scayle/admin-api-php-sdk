<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShopCategoryPropertyKeyTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryPropertyKeyCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryPropertyKeys->Create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->Get('1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->All([]);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKeyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey::class, $collectionEntity);
        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryPropertyKeyUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryPropertyKeys->Update('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->Delete('1', []);
    }
}

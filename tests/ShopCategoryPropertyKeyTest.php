<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKeyCollection;

/**
 * @internal
 */
final class ShopCategoryPropertyKeyTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryPropertyKeyCreateRequest.json');

        $requestEntity = new ShopCategoryPropertyKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryPropertyKeys->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyCreateResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->get('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyGetResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->all([]);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyAllResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKeyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCategoryPropertyKey::class, $collectionEntity);
        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryPropertyKeyUpdateRequest.json');

        $requestEntity = new ShopCategoryPropertyKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryPropertyKeys->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyUpdateResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->delete('acme', []);
    }
}

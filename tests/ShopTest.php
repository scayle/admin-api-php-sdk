<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShopTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Shop($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->Create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shops->All([]);

        $expectedResponseJson = $this->loadFixture('ShopAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shops->Get('1', []);

        $expectedResponseJson = $this->loadFixture('ShopGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Shop($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->Update('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
    }
}

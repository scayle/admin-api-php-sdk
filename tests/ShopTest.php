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

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);

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

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shops->CreateOrUpdateCustomData('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateOrUpdateCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->shops->DeleteCustomData('1', []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->shops->GetCustomData('1', []);

        $expectedResponseJson = $this->loadFixture('ShopGetCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shops->CreateOrUpdateCustomDataForKey('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateOrUpdateCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->shops->DeleteCustomDataForKey('1', '1', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->shops->GetCustomDataForKey('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopGetCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }
}

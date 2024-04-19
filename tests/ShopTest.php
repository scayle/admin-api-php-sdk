<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\AssetSource;
use AboutYou\Cloud\AdminApi\Models\Shop;
use AboutYou\Cloud\AdminApi\Models\ShopCollection;
use AboutYou\Cloud\AdminApi\Models\ShopCountry;

/**
 * @internal
 */
final class ShopTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateRequest.json');

        $requestEntity = new Shop($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateResponse.json');
        self::assertInstanceOf(Shop::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shops->all([]);

        $expectedResponseJson = $this->loadFixture('ShopAllResponse.json');
        self::assertInstanceOf(ShopCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Shop::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', ShopCountry::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shops->get('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopGetResponse.json');
        self::assertInstanceOf(Shop::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopUpdateRequest.json');

        $requestEntity = new Shop($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopUpdateResponse.json');
        self::assertInstanceOf(Shop::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shops->createOrUpdateCustomData('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->shops->deleteCustomData('acme', []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->shops->getCustomData('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shops->createOrUpdateCustomDataForKey('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->shops->deleteCustomDataForKey('acme', 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->shops->getCustomDataForKey('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }
}

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

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shops->All([]);

        $expectedResponseJson = $this->loadFixture('ShopAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shops->Get('1', []);

        $expectedResponseJson = $this->loadFixture('ShopGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
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

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
    }

    public function testUpdateAssortment()
    {
        $expectedRequestJson = $this->loadFixture('ShopUpdateAssortmentRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Assortment($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->UpdateAssortment('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopUpdateAssortmentResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Assortment::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
    }

    public function testUpdateOrCreateProperty()
    {
        $expectedRequestJson = $this->loadFixture('ShopUpdateOrCreatePropertyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopProperty($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->UpdateOrCreateProperty('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopUpdateOrCreatePropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
    }

    public function testDeleteProperty()
    {
        $responseEntity = $this->api->shops->DeleteProperty('1', '1', []);
    }

    public function testGetProperty()
    {
        $responseEntity = $this->api->shops->GetProperty('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopGetPropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
    }

    public function testAllProperties()
    {
        $responseEntity = $this->api->shops->AllProperties('1', []);

        $expectedResponseJson = $this->loadFixture('ShopAllPropertiesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopPropertyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        }
    }
}

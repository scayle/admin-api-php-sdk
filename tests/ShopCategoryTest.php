<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShopCategoryTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategory($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->Create('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'configuration', \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCategories->All('1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'configuration', \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCategories->Get('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'configuration', \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategory($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->Update('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'configuration', \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCategories->Delete('1', '1', []);
    }

    public function testUpdateOrCreateProperty()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->UpdateOrCreateProperty('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'configuration', \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class);
    }

    public function testDeleteProperty()
    {
        $responseEntity = $this->api->shopCategories->DeleteProperty('1', '1', '1', []);
    }

    public function testGetProperty()
    {
        $responseEntity = $this->api->shopCategories->GetProperty('1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetPropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'configuration', \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class);
    }

    public function testAllProperties()
    {
        $responseEntity = $this->api->shopCategories->AllProperties('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllPropertiesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'configuration', \AboutYou\Cloud\AdminApi\Models\ShopCategoryConfiguration::class);
        }
    }
}

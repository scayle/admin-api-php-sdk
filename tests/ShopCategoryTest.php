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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCategories->All('1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCategories->Get('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
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

        $responseEntity = $this->api->shopCategories->UpdateOrCreateProperty('1', '1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testDeleteProperty()
    {
        $responseEntity = $this->api->shopCategories->DeleteProperty('1', '1', '1', '1', []);
    }

    public function testGetProperty()
    {
        $responseEntity = $this->api->shopCategories->GetProperty('1', '1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetPropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testAllProperties()
    {
        $responseEntity = $this->api->shopCategories->AllProperties('1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllPropertiesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
        }
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->CreateOrUpdateCustomData('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->shopCategories->DeleteCustomData('1', '1', []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->shopCategories->GetCustomData('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->CreateOrUpdateCustomDataForKey('1', '1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->shopCategories->DeleteCustomDataForKey('1', '1', '1', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->shopCategories->GetCustomDataForKey('1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->CreateOrUpdateCustomDataForCountry('1', '1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataForCountry()
    {
        $responseEntity = $this->api->shopCategories->DeleteCustomDataForCountry('1', '1', '1', []);
    }

    public function testGetCustomDataForCountry()
    {
        $responseEntity = $this->api->shopCategories->GetCustomDataForCountry('1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataKeyForCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->CreateOrUpdateCustomDataKeyForCountry('1', '1', '1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataKeyForCountry()
    {
        $responseEntity = $this->api->shopCategories->DeleteCustomDataKeyForCountry('1', '1', '1', '1', []);
    }

    public function testGetCustomDataKeyForCountry()
    {
        $responseEntity = $this->api->shopCategories->GetCustomDataKeyForCountry('1', '1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataKeyForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testGetCountry()
    {
        $responseEntity = $this->api->shopCategories->GetCountry('1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCountryResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testUpdateOrCreateCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->UpdateOrCreateCountry('1', '1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProducts::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }
}

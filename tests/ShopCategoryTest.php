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

        $responseEntity = $this->api->shopCategories->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCategories->all('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCategories->get('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategory($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->update('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCategories->delete('acme', 1, []);
    }

    public function testUpdateOrCreateProperty()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->updateOrCreateProperty('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testDeleteProperty()
    {
        $responseEntity = $this->api->shopCategories->deleteProperty('acme', 'acme', 1, 'acme', []);
    }

    public function testGetProperty()
    {
        $responseEntity = $this->api->shopCategories->getProperty('acme', 'acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetPropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testAllProperties()
    {
        $responseEntity = $this->api->shopCategories->allProperties('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllPropertiesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
        }
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomData('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomData('acme', 1, []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->shopCategories->getCustomData('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataForKey('acme', 1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomDataForKey('acme', 1, 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->shopCategories->getCustomDataForKey('acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataForCountry('acme', 1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataForCountry()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomDataForCountry('acme', 1, 'acme', []);
    }

    public function testGetCustomDataForCountry()
    {
        $responseEntity = $this->api->shopCategories->getCustomDataForCountry('acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataKeyForCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataKeyForCountry('acme', 1, 'acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataKeyForCountry()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomDataKeyForCountry('acme', 1, 'acme', 'acme', []);
    }

    public function testGetCustomDataKeyForCountry()
    {
        $responseEntity = $this->api->shopCategories->getCustomDataKeyForCountry('acme', 1, 'acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataKeyForCountryResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testGetCountry()
    {
        $responseEntity = $this->api->shopCategories->getCountry('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCountryResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    public function testUpdateOrCreateCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->updateOrCreateCountry('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }
}

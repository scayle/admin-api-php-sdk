<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ShopCategory;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryCollection;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSet;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection;

/**
 * @internal
 */
final class ShopCategoryTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateRequest.json');

        $requestEntity = new ShopCategory($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateResponse.json');
        self::assertInstanceOf(ShopCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCategories->all('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllResponse.json');
        self::assertInstanceOf(ShopCategoryCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCategory::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSets', ShopCategoryProductSet::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', ShopCategoryProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', ShopCategoryCountry::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCategories->get('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetResponse.json');
        self::assertInstanceOf(ShopCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateRequest.json');

        $requestEntity = new ShopCategory($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->update('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateResponse.json');
        self::assertInstanceOf(ShopCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCategories->delete('acme', 1, []);
    }

    public function testUpdateOrCreateProperty()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyRequest.json');

        $requestEntity = new ShopCategoryProperty($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->updateOrCreateProperty('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyResponse.json');
        self::assertInstanceOf(ShopCategoryProperty::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);
    }

    public function testDeleteProperty()
    {
        $responseEntity = $this->api->shopCategories->deleteProperty('acme', 'acme', 1, 'acme', []);
    }

    public function testGetProperty()
    {
        $responseEntity = $this->api->shopCategories->getProperty('acme', 'acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetPropertyResponse.json');
        self::assertInstanceOf(ShopCategoryProperty::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);
    }

    public function testAllProperties()
    {
        $responseEntity = $this->api->shopCategories->allProperties('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllPropertiesResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCategoryProperty::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSets', ShopCategoryProductSet::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', ShopCategoryProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', ShopCategoryCountry::class);
        }
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomData('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomData('acme', 1, []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->shopCategories->getCustomData('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataForKey('acme', 1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomDataForKey('acme', 1, 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->shopCategories->getCustomDataForKey('acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataForCountry('acme', 1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForCountry()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomDataForCountry('acme', 1, 'acme', []);
    }

    public function testGetCustomDataForCountry()
    {
        $responseEntity = $this->api->shopCategories->getCustomDataForCountry('acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataKeyForCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataKeyForCountry('acme', 1, 'acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataKeyForCountry()
    {
        $responseEntity = $this->api->shopCategories->deleteCustomDataKeyForCountry('acme', 1, 'acme', 'acme', []);
    }

    public function testGetCustomDataKeyForCountry()
    {
        $responseEntity = $this->api->shopCategories->getCustomDataKeyForCountry('acme', 1, 'acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataKeyForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testGetCountry()
    {
        $responseEntity = $this->api->shopCategories->getCountry('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCountryResponse.json');
        self::assertInstanceOf(ShopCategoryCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);
    }

    public function testUpdateOrCreateCountry()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryRequest.json');

        $requestEntity = new ShopCategoryCountry($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->updateOrCreateCountry('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryResponse.json');
        self::assertInstanceOf(ShopCategoryCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);
    }
}

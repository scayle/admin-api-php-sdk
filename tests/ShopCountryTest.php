<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShopCountryTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCountry($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->Create('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCountries->All('1', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountryCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCountries->Get('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCountry($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->Update('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
    }

    public function testUpdateAssortment()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateAssortmentRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Assortment($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->UpdateAssortment('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateAssortmentResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Assortment::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
    }

    public function testUpdateOrCreateProperty()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateOrCreatePropertyRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopProperty($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->UpdateOrCreateProperty('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateOrCreatePropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
    }

    public function testDeleteProperty()
    {
        $responseEntity = $this->api->shopCountries->DeleteProperty('1', '1', '1', []);
    }

    public function testGetProperty()
    {
        $responseEntity = $this->api->shopCountries->GetProperty('1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetPropertyResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
    }

    public function testAllProperties()
    {
        $responseEntity = $this->api->shopCountries->AllProperties('1', '1', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryAllPropertiesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopPropertyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class);
        }
    }
}

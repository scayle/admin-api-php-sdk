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
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCountries->all('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountryCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCountries->get('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCountry($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->update('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class);
    }

    public function testUpdateAssortment()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateAssortmentRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Assortment($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->updateAssortment('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateAssortmentResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Assortment::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', \AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse::class);
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCountries->createOrUpdateCustomData('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->shopCountries->deleteCustomData('acme', 'acme', []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->shopCountries->getCustomData('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCountries->createOrUpdateCustomDataForKey('acme', 'acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->shopCountries->deleteCustomDataForKey('acme', 'acme', 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->shopCountries->getCustomDataForKey('acme', 'acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }
}

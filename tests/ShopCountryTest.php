<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Assortment;
use AboutYou\Cloud\AdminApi\Models\ShopCountry;
use AboutYou\Cloud\AdminApi\Models\ShopCountryCollection;
use AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse;

/**
 * @internal
 */
final class ShopCountryTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateRequest.json');

        $requestEntity = new ShopCountry($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateResponse.json');
        self::assertInstanceOf(ShopCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', ShopCountryWarehouse::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->shopCountries->all('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryAllResponse.json');
        self::assertInstanceOf(ShopCountryCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', ShopCountryWarehouse::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCountry::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'assortment', Assortment::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'warehouses', ShopCountryWarehouse::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shopCountries->get('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetResponse.json');
        self::assertInstanceOf(ShopCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', ShopCountryWarehouse::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateRequest.json');

        $requestEntity = new ShopCountry($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->update('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateResponse.json');
        self::assertInstanceOf(ShopCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', ShopCountryWarehouse::class);
    }

    public function testUpdateAssortment()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateAssortmentRequest.json');

        $requestEntity = new Assortment($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->updateAssortment('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateAssortmentResponse.json');
        self::assertInstanceOf(Assortment::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', ShopCountryWarehouse::class);
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCountries->createOrUpdateCustomData('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->shopCountries->deleteCustomData('acme', 'acme', []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->shopCountries->getCustomData('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCountries->createOrUpdateCustomDataForKey('acme', 'acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->shopCountries->deleteCustomDataForKey('acme', 'acme', 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->shopCountries->getCustomDataForKey('acme', 'acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }
}

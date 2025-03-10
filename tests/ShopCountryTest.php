<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Models\Assortment;
use Scayle\Cloud\AdminApi\Models\AttributeAssortmentConfiguration;
use Scayle\Cloud\AdminApi\Models\MasterCategoryAssortmentConfiguration;
use Scayle\Cloud\AdminApi\Models\MerchantAssortmentConfiguration;
use Scayle\Cloud\AdminApi\Models\ProductAssortmentConfiguration;
use Scayle\Cloud\AdminApi\Models\ShopCountry;
use Scayle\Cloud\AdminApi\Models\ShopCountryCollection;
use Scayle\Cloud\AdminApi\Models\ShopCountryWarehouse;

/**
 * @internal
 */
final class ShopCountryTest extends BaseApiTestCase
{
    public function testCreate(): void
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

    public function testAll(): void
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

    public function testGet(): void
    {
        $responseEntity = $this->api->shopCountries->get('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetResponse.json');
        self::assertInstanceOf(ShopCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', Assortment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'warehouses', ShopCountryWarehouse::class);



    }

    public function testUpdate(): void
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

    public function testUpdateAssortment(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryUpdateAssortmentRequest.json');

        $requestEntity = new Assortment($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountries->updateAssortment('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryUpdateAssortmentResponse.json');
        self::assertInstanceOf(Assortment::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'masterCategories', MasterCategoryAssortmentConfiguration::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'products', ProductAssortmentConfiguration::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', AttributeAssortmentConfiguration::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchantReferenceKeys', MerchantAssortmentConfiguration::class);



    }

    public function testCreateOrUpdateCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCountries->createOrUpdateCustomData('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomData(): void
    {
        $this->api->shopCountries->deleteCustomData('acme', 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomData(): void
    {
        $responseEntity = $this->api->shopCountries->getCustomData('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForKey(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCountries->createOrUpdateCustomDataForKey('acme', 'acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForKey(): void
    {
        $this->api->shopCountries->deleteCustomDataForKey('acme', 'acme', 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForKey(): void
    {
        $responseEntity = $this->api->shopCountries->getCustomDataForKey('acme', 'acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }
}

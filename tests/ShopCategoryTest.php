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

use Scayle\Cloud\AdminApi\Models\ShopCategory;
use Scayle\Cloud\AdminApi\Models\ShopCategoryCollection;
use Scayle\Cloud\AdminApi\Models\ShopCategoryCountry;
use Scayle\Cloud\AdminApi\Models\ShopCategoryProductSet;
use Scayle\Cloud\AdminApi\Models\ShopCategoryProperty;
use Scayle\Cloud\AdminApi\Models\ShopCategoryPropertyCollection;

/**
 * @internal
 */
final class ShopCategoryTest extends BaseApiTestCase
{
    public function testCreate(): void
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

    public function testAll(): void
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

    public function testGet(): void
    {
        $responseEntity = $this->api->shopCategories->get('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetResponse.json');
        self::assertInstanceOf(ShopCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSets', ShopCategoryProductSet::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCategoryCountry::class);



    }

    public function testUpdate(): void
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

    public function testDelete(): void
    {
        $this->api->shopCategories->delete('acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateOrCreateProperty(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyRequest.json');

        $requestEntity = new ShopCategoryProperty($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->updateOrCreateProperty('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreatePropertyResponse.json');
        self::assertInstanceOf(ShopCategoryProperty::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteProperty(): void
    {
        $this->api->shopCategories->deleteProperty('acme', 'acme', 1, 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetProperty(): void
    {
        $responseEntity = $this->api->shopCategories->getProperty('acme', 'acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetPropertyResponse.json');
        self::assertInstanceOf(ShopCategoryProperty::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAllProperties(): void
    {
        $responseEntity = $this->api->shopCategories->allProperties('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryAllPropertiesResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCategoryProperty::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSets', ShopCategoryProductSet::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', ShopCategoryProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', ShopCategoryCountry::class);

        }
    }

    public function testCreateOrUpdateCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomData('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomData(): void
    {
        $this->api->shopCategories->deleteCustomData('acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomData(): void
    {
        $responseEntity = $this->api->shopCategories->getCustomData('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForKey(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataForKey('acme', 1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForKey(): void
    {
        $this->api->shopCategories->deleteCustomDataForKey('acme', 1, 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForKey(): void
    {
        $responseEntity = $this->api->shopCategories->getCustomDataForKey('acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForCountry(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataForCountry('acme', 1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForCountry(): void
    {
        $this->api->shopCategories->deleteCustomDataForCountry('acme', 1, 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForCountry(): void
    {
        $responseEntity = $this->api->shopCategories->getCustomDataForCountry('acme', 1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataKeyForCountry(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shopCategories->createOrUpdateCustomDataKeyForCountry('acme', 1, 'acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryCreateOrUpdateCustomDataKeyForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataKeyForCountry(): void
    {
        $this->api->shopCategories->deleteCustomDataKeyForCountry('acme', 1, 'acme', 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataKeyForCountry(): void
    {
        $responseEntity = $this->api->shopCategories->getCustomDataKeyForCountry('acme', 1, 'acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCustomDataKeyForCountryResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testGetCountry(): void
    {
        $responseEntity = $this->api->shopCategories->getCountry('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryGetCountryResponse.json');
        self::assertInstanceOf(ShopCategoryCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);



    }

    public function testUpdateOrCreateCountry(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryRequest.json');

        $requestEntity = new ShopCategoryCountry($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategories->updateOrCreateCountry('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryUpdateOrCreateCountryResponse.json');
        self::assertInstanceOf(ShopCategoryCountry::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', ShopCategoryProperty::class);



    }
}

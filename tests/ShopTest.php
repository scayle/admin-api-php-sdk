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

use Scayle\Cloud\AdminApi\Models\AssetSource;
use Scayle\Cloud\AdminApi\Models\Shop;
use Scayle\Cloud\AdminApi\Models\ShopCollection;
use Scayle\Cloud\AdminApi\Models\ShopCountry;

/**
 * @internal
 */
final class ShopTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateRequest.json');

        $requestEntity = new Shop($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateResponse.json');
        self::assertInstanceOf(Shop::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);



    }

    public function testAll(): void
    {
        $responseEntity = $this->api->shops->all([]);

        $expectedResponseJson = $this->loadFixture('ShopAllResponse.json');
        self::assertInstanceOf(ShopCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Shop::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'countries', ShopCountry::class);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->shops->get('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopGetResponse.json');
        self::assertInstanceOf(Shop::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopUpdateRequest.json');

        $requestEntity = new Shop($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopUpdateResponse.json');
        self::assertInstanceOf(Shop::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'countries', ShopCountry::class);



    }

    public function testCreateOrUpdateCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shops->createOrUpdateCustomData('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomData(): void
    {
        $this->api->shops->deleteCustomData('acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomData(): void
    {
        $responseEntity = $this->api->shops->getCustomData('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForKey(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->shops->createOrUpdateCustomDataForKey('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForKey(): void
    {
        $this->api->shops->deleteCustomDataForKey('acme', 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForKey(): void
    {
        $responseEntity = $this->api->shops->getCustomDataForKey('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }
}

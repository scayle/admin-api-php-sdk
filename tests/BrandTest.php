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
use Scayle\Cloud\AdminApi\Models\Attribute;
use Scayle\Cloud\AdminApi\Models\Brand;
use Scayle\Cloud\AdminApi\Models\BrandCollection;

/**
 * @internal
 */
final class BrandTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->brands->all([]);

        $expectedResponseJson = $this->loadFixture('BrandAllResponse.json');
        self::assertInstanceOf(BrandCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Brand::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', AssetSource::class);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->brands->get(1, []);

        $expectedResponseJson = $this->loadFixture('BrandGetResponse.json');
        self::assertInstanceOf(Brand::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);



    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('BrandCreateRequest.json');

        $requestEntity = new Brand($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->brands->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandCreateResponse.json');
        self::assertInstanceOf(Brand::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('BrandUpdateRequest.json');

        $requestEntity = new Brand($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->brands->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandUpdateResponse.json');
        self::assertInstanceOf(Brand::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', AssetSource::class);



    }

    public function testDelete(): void
    {
        $this->api->brands->delete(1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testCreateOrUpdateCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('BrandCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->brands->createOrUpdateCustomData(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomData(): void
    {
        $this->api->brands->deleteCustomData(1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomData(): void
    {
        $responseEntity = $this->api->brands->getCustomData(1, []);

        $expectedResponseJson = $this->loadFixture('BrandGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForKey(): void
    {
        $expectedRequestJson = $this->loadFixture('BrandCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->brands->createOrUpdateCustomDataForKey(1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForKey(): void
    {
        $this->api->brands->deleteCustomDataForKey(1, 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForKey(): void
    {
        $responseEntity = $this->api->brands->getCustomDataForKey(1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('BrandGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }
}

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

use Scayle\Cloud\AdminApi\Models\Campaign;
use Scayle\Cloud\AdminApi\Models\CampaignCollection;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\ProductCampaignReduction;
use Scayle\Cloud\AdminApi\Models\ProductVariantCampaignReduction;
use Scayle\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection;

/**
 * @internal
 */
final class CampaignTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateRequest.json');

        $requestEntity = new Campaign($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateResponse.json');
        self::assertInstanceOf(Campaign::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->campaigns->all('acme', []);

        $expectedResponseJson = $this->loadFixture('CampaignAllResponse.json');
        self::assertInstanceOf(CampaignCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Campaign::class, $collectionEntity);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->campaigns->get('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('CampaignGetResponse.json');
        self::assertInstanceOf(Campaign::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateRequest.json');

        $requestEntity = new Campaign($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->update('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignUpdateResponse.json');
        self::assertInstanceOf(Campaign::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->campaigns->delete('acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateOrCreateVariantReductions(): void
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateOrCreateVariantReductionsRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductVariantCampaignReduction($entity);
        }

        $this->api->campaigns->updateOrCreateVariantReductions('acme', 1, $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateOrCreateProductReductions(): void
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateOrCreateProductReductionsRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductCampaignReduction($entity);
        }

        $this->api->campaigns->updateOrCreateProductReductions('acme', 1, $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAllReductions(): void
    {
        $responseEntity = $this->api->campaigns->allReductions('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('CampaignAllReductionsResponse.json');
        self::assertInstanceOf(ProductVariantCampaignReductionCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductVariantCampaignReduction::class, $collectionEntity);

        }
    }

    public function testDeleteReductions(): void
    {
        $this->api->campaigns->deleteReductions('acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testCreateOrUpdateCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->campaigns->createOrUpdateCustomData(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomData(): void
    {
        $this->api->campaigns->deleteCustomData(Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomData(): void
    {
        $responseEntity = $this->api->campaigns->getCustomData(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CampaignGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForKey(): void
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->campaigns->createOrUpdateCustomDataForKey(Identifier::fromId(1), 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForKey(): void
    {
        $this->api->campaigns->deleteCustomDataForKey(Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForKey(): void
    {
        $responseEntity = $this->api->campaigns->getCustomDataForKey(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('CampaignGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }
}

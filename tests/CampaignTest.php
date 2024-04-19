<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Campaign;
use AboutYou\Cloud\AdminApi\Models\CampaignCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductCampaignReduction;
use AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReduction;
use AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection;

/**
 * @internal
 */
final class CampaignTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateRequest.json');

        $requestEntity = new Campaign($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateResponse.json');
        self::assertInstanceOf(Campaign::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->campaigns->all('acme', []);

        $expectedResponseJson = $this->loadFixture('CampaignAllResponse.json');
        self::assertInstanceOf(CampaignCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Campaign::class, $collectionEntity);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->campaigns->get('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('CampaignGetResponse.json');
        self::assertInstanceOf(Campaign::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateRequest.json');

        $requestEntity = new Campaign($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->update('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignUpdateResponse.json');
        self::assertInstanceOf(Campaign::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->campaigns->delete('acme', 1, []);
    }

    public function testUpdateOrCreateVariantReductions()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateOrCreateVariantReductionsRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductVariantCampaignReduction($entity);
        }

        $responseEntity = $this->api->campaigns->updateOrCreateVariantReductions('acme', 1, $requestEntity, []);
    }

    public function testUpdateOrCreateProductReductions()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateOrCreateProductReductionsRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductCampaignReduction($entity);
        }

        $responseEntity = $this->api->campaigns->updateOrCreateProductReductions('acme', 1, $requestEntity, []);
    }

    public function testAllReductions()
    {
        $responseEntity = $this->api->campaigns->allReductions('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('CampaignAllReductionsResponse.json');
        self::assertInstanceOf(ProductVariantCampaignReductionCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductVariantCampaignReduction::class, $collectionEntity);
        }
    }

    public function testDeleteReductions()
    {
        $responseEntity = $this->api->campaigns->deleteReductions('acme', 1, []);
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->campaigns->createOrUpdateCustomData(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->campaigns->deleteCustomData(Identifier::fromId(1), []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->campaigns->getCustomData(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CampaignGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->campaigns->createOrUpdateCustomDataForKey(Identifier::fromId(1), 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->campaigns->deleteCustomDataForKey(Identifier::fromId(1), 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->campaigns->getCustomDataForKey(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('CampaignGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }
}

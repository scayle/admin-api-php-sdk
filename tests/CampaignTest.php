<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class CampaignTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Campaign($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->campaigns->all('acme', []);

        $expectedResponseJson = $this->loadFixture('CampaignAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CampaignCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $collectionEntity);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->campaigns->get('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('CampaignGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Campaign($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->update('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
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
            $requestEntity[] = new \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReduction($entity);
        }

        $responseEntity = $this->api->campaigns->updateOrCreateVariantReductions('acme', 1, $requestEntity, []);
    }

    public function testUpdateOrCreateProductReductions()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateOrCreateProductReductionsRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new \AboutYou\Cloud\AdminApi\Models\ProductCampaignReduction($entity);
        }

        $responseEntity = $this->api->campaigns->updateOrCreateProductReductions('acme', 1, $requestEntity, []);
    }

    public function testAllReductions()
    {
        $responseEntity = $this->api->campaigns->allReductions('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('CampaignAllReductionsResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReduction::class, $collectionEntity);
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
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->campaigns->deleteCustomData(Identifier::fromId(1), []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->campaigns->getCustomData(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CampaignGetCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->campaigns->createOrUpdateCustomDataForKey(Identifier::fromId(1), 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateOrUpdateCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->campaigns->deleteCustomDataForKey(Identifier::fromId(1), 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->campaigns->getCustomDataForKey(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('CampaignGetCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }
}

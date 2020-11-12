<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

class CampaignTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CampaignCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Campaign($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->Create($requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('CampaignCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testAll()
    {
        $responseEntity = $this->api->campaigns->All( []);

        $expectedResponseJson = $this->loadFixture('CampaignAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CampaignCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $collectionEntity);

        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->campaigns->Get('1',  []);

        $expectedResponseJson = $this->loadFixture('CampaignGetResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Campaign($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->campaigns->Update('1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('CampaignUpdateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Campaign::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testDelete()
    {
        $responseEntity = $this->api->campaigns->Delete('1',  []);

    }

    public function testUpdateOrCreateVariantReductions()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateOrCreateVariantReductionsRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            array_push($requestEntity, new \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReduction($entity));
        }

        $responseEntity = $this->api->campaigns->UpdateOrCreateVariantReductions('1', $requestEntity,  []);

    }

    public function testUpdateOrCreateProductReductions()
    {
        $expectedRequestJson = $this->loadFixture('CampaignUpdateOrCreateProductReductionsRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            array_push($requestEntity, new \AboutYou\Cloud\AdminApi\Models\ProductCampaignReduction($entity));
        }

        $responseEntity = $this->api->campaigns->UpdateOrCreateProductReductions('1', $requestEntity,  []);

    }

    public function testAllReductions()
    {
        $responseEntity = $this->api->campaigns->AllReductions('1',  []);

        $expectedResponseJson = $this->loadFixture('CampaignAllReductionsResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReduction::class, $collectionEntity);

        }
    }

    public function testDeleteReductions()
    {
        $responseEntity = $this->api->campaigns->DeleteReductions('1',  []);

    }

}
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

}
<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

class AttributeGroupTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\AttributeGroup($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->Create($requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeGroup::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testGet()
    {
        $responseEntity = $this->api->attributeGroups->Get('1',  []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupGetResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeGroup::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testAll()
    {
        $responseEntity = $this->api->attributeGroups->All( []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeGroupCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeGroup::class, $collectionEntity);

        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\AttributeGroup($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->Update('1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupUpdateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeGroup::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testDelete()
    {
        $responseEntity = $this->api->attributeGroups->Delete('1',  []);

    }

}
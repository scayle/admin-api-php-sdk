<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

class AttributeTranslationTest extends BaseApiTestCase
{
    public function testUpdateOrCreate()
    {
        $expectedRequestJson = $this->loadFixture('AttributeTranslationUpdateOrCreateRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->attributeTranslations->UpdateOrCreate('1', $requestEntity,  []);

    }

    public function testAll()
    {
        $responseEntity = $this->api->attributeTranslations->All('1',  []);

        $expectedResponseJson = $this->loadFixture('AttributeTranslationAllResponse.json');
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


    }

}
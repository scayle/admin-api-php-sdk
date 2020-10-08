<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

class ShopTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Shop($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->Create($requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ShopCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\ShopLogoSource::class);


    }

}
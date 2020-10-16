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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);


    }

    public function testAll()
    {
        $responseEntity = $this->api->shops->All( []);

        $expectedResponseJson = $this->loadFixture('ShopAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\ShopLogoSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);

        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->shops->Get('1',  []);

        $expectedResponseJson = $this->loadFixture('ShopGetResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\ShopLogoSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);


    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ShopUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Shop($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->Update('1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ShopUpdateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shop::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\ShopLogoSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);


    }

    public function testUpdateAssortment()
    {
        $expectedRequestJson = $this->loadFixture('ShopUpdateAssortmentRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Assortment($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shops->UpdateAssortment('1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ShopUpdateAssortmentResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Assortment::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'properties', \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\ShopLogoSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'assortment', \AboutYou\Cloud\AdminApi\Models\Assortment::class);


    }

}
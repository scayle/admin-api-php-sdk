<?php

namespace AboutYou\Cloud\AdminApi;

class ProductVariantPriceTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantPriceCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantPrices->Create('1', '1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantPriceCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'unitPrice', \AboutYou\Cloud\AdminApi\Models\ProductVariantUnitPrice::class);


    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariantPrices->All('1', '1',  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantPriceAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'unitPrice', \AboutYou\Cloud\AdminApi\Models\ProductVariantUnitPrice::class);

        }
    }

}
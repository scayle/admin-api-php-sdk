<?php

namespace AboutYou\Cloud\AdminApi;

class ProductVariantStockTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantStockCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariantStock($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantStocks->Create('1', '1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantStockCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantStock::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariantStocks->All('1', '1',  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantStockAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantStockCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantStock::class, $collectionEntity);

        }
    }

}
<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductVariantStock;
use AboutYou\Cloud\AdminApi\Models\ProductVariantStockCollection;

/**
 * @internal
 */
final class ProductVariantStockTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantStockCreateRequest.json');

        $requestEntity = new ProductVariantStock($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantStocks->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantStockCreateResponse.json');
        self::assertInstanceOf(ProductVariantStock::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariantStocks->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantStockAllResponse.json');
        self::assertInstanceOf(ProductVariantStockCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductVariantStock::class, $collectionEntity);
        }
    }
}

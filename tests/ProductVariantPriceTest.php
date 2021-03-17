<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class ProductVariantPriceTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantPriceCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantPrices->Create(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantPriceCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'unitPrice', \AboutYou\Cloud\AdminApi\Models\ProductVariantUnitPrice::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariantPrices->All(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantPriceAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'unitPrice', \AboutYou\Cloud\AdminApi\Models\ProductVariantUnitPrice::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'unitPrice', \AboutYou\Cloud\AdminApi\Models\ProductVariantUnitPrice::class);
        }
    }

    public function testDeleteFuturePrice()
    {
        $responseEntity = $this->api->productVariantPrices->DeleteFuturePrice(Identifier::fromId(1), Identifier::fromId(1), '1', []);
    }
}

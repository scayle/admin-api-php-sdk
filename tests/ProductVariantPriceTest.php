<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductVariantPrice;
use AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection;
use AboutYou\Cloud\AdminApi\Models\ProductVariantUnitPrice;

/**
 * @internal
 */
final class ProductVariantPriceTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantPriceCreateRequest.json');

        $requestEntity = new ProductVariantPrice($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantPrices->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantPriceCreateResponse.json');
        self::assertInstanceOf(ProductVariantPrice::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'unitPrice', ProductVariantUnitPrice::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariantPrices->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantPriceAllResponse.json');
        self::assertInstanceOf(ProductVariantPriceCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'unitPrice', ProductVariantUnitPrice::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductVariantPrice::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'unitPrice', ProductVariantUnitPrice::class);
        }
    }

    public function testDelete()
    {
        $responseEntity = $this->api->productVariantPrices->delete(Identifier::fromId(1), 'acme', []);
    }
}

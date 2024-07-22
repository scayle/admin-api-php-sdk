<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\SellableWithoutStock;

/**
 * @internal
 */
final class SellableWithoutStockTest extends BaseApiTestCase
{
    public function testSetSellableWithoutStock()
    {
        $expectedRequestJson = $this->loadFixture('SellableWithoutStockSetSellableWithoutStockRequest.json');

        $requestEntity = new SellableWithoutStock($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->sellableWithoutStocks->setSellableWithoutStock(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('SellableWithoutStockSetSellableWithoutStockResponse.json');
        self::assertInstanceOf(SellableWithoutStock::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

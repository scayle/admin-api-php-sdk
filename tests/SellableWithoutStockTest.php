<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\SellableWithoutStock;

/**
 * @internal
 */
final class SellableWithoutStockTest extends BaseApiTestCase
{
    public function testSetSellableWithoutStock(): void
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

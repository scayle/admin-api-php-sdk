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

use Scayle\Cloud\AdminApi\Models\BulkRequest;
use Scayle\Cloud\AdminApi\Models\CreateBulkRequest;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\ProductVariantStock;
use Scayle\Cloud\AdminApi\Models\ProductVariantStockCollection;

/**
 * @internal
 */
final class ProductVariantStockTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantStockCreateRequest.json');

        $requestEntity = new ProductVariantStock($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantStocks->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantStockCreateResponse.json');
        self::assertInstanceOf(ProductVariantStock::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->productVariantStocks->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantStockAllResponse.json');
        self::assertInstanceOf(ProductVariantStockCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductVariantStock::class, $collectionEntity);

        }
    }

    public function testCreateBulkRequest(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantStockCreateBulkRequestRequest.json');

        $requestEntity = new CreateBulkRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantStocks->createBulkRequest($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantStockCreateBulkRequestResponse.json');
        self::assertInstanceOf(BulkRequest::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }
}

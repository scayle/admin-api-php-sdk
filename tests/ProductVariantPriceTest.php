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
use Scayle\Cloud\AdminApi\Models\ProductVariantPrice;
use Scayle\Cloud\AdminApi\Models\ProductVariantPriceCollection;
use Scayle\Cloud\AdminApi\Models\ProductVariantUnitPrice;

/**
 * @internal
 */
final class ProductVariantPriceTest extends BaseApiTestCase
{
    public function testCreate(): void
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

    public function testAll(): void
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

    public function testDelete(): void
    {
        $this->api->productVariantPrices->delete(Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testCreateBulkRequest(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantPriceCreateBulkRequestRequest.json');

        $requestEntity = new CreateBulkRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariantPrices->createBulkRequest($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantPriceCreateBulkRequestResponse.json');
        self::assertInstanceOf(BulkRequest::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }
}

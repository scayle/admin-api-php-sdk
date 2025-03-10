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

use Scayle\Cloud\AdminApi\Models\PromotionItemSet;
use Scayle\Cloud\AdminApi\Models\PromotionItemSetCollection;

/**
 * @internal
 */
final class PromotionItemSetTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('PromotionItemSetCreateRequest.json');

        $requestEntity = new PromotionItemSet($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotionItemSets->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionItemSetCreateResponse.json');
        self::assertInstanceOf(PromotionItemSet::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGet(): void
    {
        $responseEntity = $this->api->promotionItemSets->get('64cbc70225ae598c0d0d0334', []);

        $expectedResponseJson = $this->loadFixture('PromotionItemSetGetResponse.json');
        self::assertInstanceOf(PromotionItemSet::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->promotionItemSets->delete('645e0c241a93369ff53f26e0', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAll(): void
    {
        $responseEntity = $this->api->promotionItemSets->all([]);

        $expectedResponseJson = $this->loadFixture('PromotionItemSetAllResponse.json');
        self::assertInstanceOf(PromotionItemSetCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(PromotionItemSet::class, $collectionEntity);

        }
    }
}

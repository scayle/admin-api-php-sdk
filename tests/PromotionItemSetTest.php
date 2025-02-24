<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\PromotionItemSet;
use AboutYou\Cloud\AdminApi\Models\PromotionItemSetCollection;

/**
 * @internal
 */
final class PromotionItemSetTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('PromotionItemSetCreateRequest.json');

        $requestEntity = new PromotionItemSet($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotionItemSets->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionItemSetCreateResponse.json');
        self::assertInstanceOf(PromotionItemSet::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGet()
    {
        $responseEntity = $this->api->promotionItemSets->get('64cbc70225ae598c0d0d0334', []);

        $expectedResponseJson = $this->loadFixture('PromotionItemSetGetResponse.json');
        self::assertInstanceOf(PromotionItemSet::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->promotionItemSets->delete('645e0c241a93369ff53f26e0', []);
    }

    public function testAll()
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

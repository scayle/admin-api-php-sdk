<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\PromotionCodes;

/**
 * @internal
 */
final class PromotionCodesTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('PromotionCodesCreateRequest.json');

        $requestEntity = new PromotionCodes($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotionCodess->create('645e0c241a93369ff53f26e0', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionCodesCreateResponse.json');
        self::assertInstanceOf(PromotionCodes::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

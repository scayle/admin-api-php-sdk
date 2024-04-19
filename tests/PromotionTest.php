<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Promotion;
use AboutYou\Cloud\AdminApi\Models\PromotionAudiences;
use AboutYou\Cloud\AdminApi\Models\PromotionEffect;
use AboutYou\Cloud\AdminApi\Models\PromotionGlobalCondition;
use AboutYou\Cloud\AdminApi\Models\PromotionItemCondition;
use AboutYou\Cloud\AdminApi\Models\PromotionSchedule;
use AboutYou\Cloud\AdminApi\Models\PromotionSiblingPromotions;
use AboutYou\Cloud\AdminApi\Models\PromotionTier;

/**
 * @internal
 */
final class PromotionTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('PromotionCreateRequest.json');

        $requestEntity = new Promotion($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotions->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionCreateResponse.json');
        self::assertInstanceOf(Promotion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', PromotionSchedule::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotions::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudiences::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'globalConditions', PromotionGlobalCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'itemConditions', PromotionItemCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTier::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('PromotionUpdateRequest.json');

        $requestEntity = new Promotion($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotions->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionUpdateResponse.json');
        self::assertInstanceOf(Promotion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', PromotionSchedule::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotions::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudiences::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'globalConditions', PromotionGlobalCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'itemConditions', PromotionItemCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTier::class);
    }
}

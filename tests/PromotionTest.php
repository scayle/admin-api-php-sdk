<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Promotion;
use AboutYou\Cloud\AdminApi\Models\PromotionAudience;
use AboutYou\Cloud\AdminApi\Models\PromotionCollection;
use AboutYou\Cloud\AdminApi\Models\PromotionCondition;
use AboutYou\Cloud\AdminApi\Models\PromotionEffect;
use AboutYou\Cloud\AdminApi\Models\PromotionSchedule;
use AboutYou\Cloud\AdminApi\Models\PromotionSiblingPromotion;
use AboutYou\Cloud\AdminApi\Models\PromotionTier;
use AboutYou\Cloud\AdminApi\Models\PromotionUsageLimit;

/**
 * @internal
 */
final class PromotionTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->promotions->all([]);

        $expectedResponseJson = $this->loadFixture('PromotionAllResponse.json');
        self::assertInstanceOf(PromotionCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', PromotionSchedule::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotion::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudience::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'conditions', PromotionCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'usageLimit', PromotionUsageLimit::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Promotion::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'schedule', PromotionSchedule::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'siblingPromotions', PromotionSiblingPromotion::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'audiences', PromotionAudience::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'effect', PromotionEffect::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'conditions', PromotionCondition::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'tiers', PromotionTier::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'usageLimit', PromotionUsageLimit::class);
        }
    }

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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotion::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudience::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'conditions', PromotionCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'usageLimit', PromotionUsageLimit::class);
    }

    public function testGet()
    {
        $responseEntity = $this->api->promotions->get('645e0c241a93369ff53f26e0', []);

        $expectedResponseJson = $this->loadFixture('PromotionGetResponse.json');
        self::assertInstanceOf(Promotion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', PromotionSchedule::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotion::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudience::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'conditions', PromotionCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'usageLimit', PromotionUsageLimit::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->promotions->delete('645e0c241a93369ff53f26e0', []);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('PromotionUpdateRequest.json');

        $requestEntity = new Promotion($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotions->update('645e0c241a93369ff53f26e0', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionUpdateResponse.json');
        self::assertInstanceOf(Promotion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', PromotionSchedule::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotion::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudience::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'conditions', PromotionCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTier::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'usageLimit', PromotionUsageLimit::class);
    }
}

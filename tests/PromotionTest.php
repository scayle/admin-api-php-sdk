<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class PromotionTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('PromotionCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Promotion($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotions->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Promotion::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', \AboutYou\Cloud\AdminApi\Models\PromotionSchedule::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', \AboutYou\Cloud\AdminApi\Models\PromotionSiblingPromotions::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', \AboutYou\Cloud\AdminApi\Models\PromotionAudiences::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', \AboutYou\Cloud\AdminApi\Models\PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'globalConditions', \AboutYou\Cloud\AdminApi\Models\PromotionGlobalCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'itemConditions', \AboutYou\Cloud\AdminApi\Models\PromotionItemCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', \AboutYou\Cloud\AdminApi\Models\PromotionTier::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('PromotionUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Promotion($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotions->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Promotion::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', \AboutYou\Cloud\AdminApi\Models\PromotionSchedule::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', \AboutYou\Cloud\AdminApi\Models\PromotionSiblingPromotions::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', \AboutYou\Cloud\AdminApi\Models\PromotionAudiences::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', \AboutYou\Cloud\AdminApi\Models\PromotionEffect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'globalConditions', \AboutYou\Cloud\AdminApi\Models\PromotionGlobalCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'itemConditions', \AboutYou\Cloud\AdminApi\Models\PromotionItemCondition::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', \AboutYou\Cloud\AdminApi\Models\PromotionTier::class);
    }
}

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

use Scayle\Cloud\AdminApi\Models\PromotionAudiencesV1;
use Scayle\Cloud\AdminApi\Models\PromotionEffectV1;
use Scayle\Cloud\AdminApi\Models\PromotionGlobalConditionV1;
use Scayle\Cloud\AdminApi\Models\PromotionItemConditionV1;
use Scayle\Cloud\AdminApi\Models\PromotionScheduleV1;
use Scayle\Cloud\AdminApi\Models\PromotionSiblingPromotionsV1;
use Scayle\Cloud\AdminApi\Models\PromotionTierV1;
use Scayle\Cloud\AdminApi\Models\PromotionV1;

/**
 * @internal
 */
final class PromotionV1Test extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('PromotionV1CreateRequest.json');

        $requestEntity = new PromotionV1($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotionV1s->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionV1CreateResponse.json');
        self::assertInstanceOf(PromotionV1::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', PromotionScheduleV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotionsV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudiencesV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffectV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'globalConditions', PromotionGlobalConditionV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'itemConditions', PromotionItemConditionV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTierV1::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('PromotionV1UpdateRequest.json');

        $requestEntity = new PromotionV1($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotionV1s->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionV1UpdateResponse.json');
        self::assertInstanceOf(PromotionV1::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'schedule', PromotionScheduleV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'siblingPromotions', PromotionSiblingPromotionsV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'audiences', PromotionAudiencesV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'effect', PromotionEffectV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'globalConditions', PromotionGlobalConditionV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'itemConditions', PromotionItemConditionV1::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'tiers', PromotionTierV1::class);



    }
}

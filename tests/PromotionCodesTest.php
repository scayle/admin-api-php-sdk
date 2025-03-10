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

use Scayle\Cloud\AdminApi\Models\PromotionCode;
use Scayle\Cloud\AdminApi\Models\PromotionCodeCollection;
use Scayle\Cloud\AdminApi\Models\PromotionCodes;

/**
 * @internal
 */
final class PromotionCodesTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('PromotionCodesCreateRequest.json');

        $requestEntity = new PromotionCodes($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->promotionCodess->create('645e0c241a93369ff53f26e0', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('PromotionCodesCreateResponse.json');
        self::assertInstanceOf(PromotionCodes::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->promotionCodess->all('645e0c241a93369ff53f26e0', []);

        $expectedResponseJson = $this->loadFixture('PromotionCodesAllResponse.json');
        self::assertInstanceOf(PromotionCodeCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(PromotionCode::class, $collectionEntity);

        }
    }

    public function testDelete(): void
    {
        $this->api->promotionCodess->delete('645e0c241a93369ff53f26e0', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

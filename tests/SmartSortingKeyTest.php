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

use Scayle\Cloud\AdminApi\Models\SmartSortingKey;
use Scayle\Cloud\AdminApi\Models\SmartSortingKeyCollection;
use Scayle\Cloud\AdminApi\Models\SmartSortingKeyWeights;

/**
 * @internal
 */
final class SmartSortingKeyTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('SmartSortingKeyCreateRequest.json');

        $requestEntity = new SmartSortingKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->smartSortingKeys->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('SmartSortingKeyCreateResponse.json');
        self::assertInstanceOf(SmartSortingKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'weights', SmartSortingKeyWeights::class);



    }

    public function testGet(): void
    {
        $responseEntity = $this->api->smartSortingKeys->get('key=summer-priority', []);

        $expectedResponseJson = $this->loadFixture('SmartSortingKeyGetResponse.json');
        self::assertInstanceOf(SmartSortingKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'weights', SmartSortingKeyWeights::class);



    }

    public function testAll(): void
    {
        $responseEntity = $this->api->smartSortingKeys->all([]);

        $expectedResponseJson = $this->loadFixture('SmartSortingKeyAllResponse.json');
        self::assertInstanceOf(SmartSortingKeyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'weights', SmartSortingKeyWeights::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(SmartSortingKey::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'weights', SmartSortingKeyWeights::class);

        }
    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('SmartSortingKeyUpdateRequest.json');

        $requestEntity = new SmartSortingKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->smartSortingKeys->update('key=summer-priority', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('SmartSortingKeyUpdateResponse.json');
        self::assertInstanceOf(SmartSortingKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'weights', SmartSortingKeyWeights::class);



    }

    public function testDelete(): void
    {
        $this->api->smartSortingKeys->delete('key=summer-priority', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

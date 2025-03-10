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

use Scayle\Cloud\AdminApi\Models\CustomDataConfig;

/**
 * @internal
 */
final class CustomDataConfigTest extends BaseApiTestCase
{
    public function testGet(): void
    {
        $responseEntity = $this->api->customDataConfigs->get('acme', []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigGetResponse.json');
        self::assertInstanceOf(CustomDataConfig::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomDataConfigCreateRequest.json');

        $requestEntity = new CustomDataConfig($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customDataConfigs->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigCreateResponse.json');
        self::assertInstanceOf(CustomDataConfig::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomDataConfigUpdateRequest.json');

        $requestEntity = new CustomDataConfig($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customDataConfigs->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigUpdateResponse.json');
        self::assertInstanceOf(CustomDataConfig::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->customDataConfigs->delete('acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

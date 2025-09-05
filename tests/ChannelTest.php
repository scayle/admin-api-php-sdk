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

use Scayle\Cloud\AdminApi\Models\Channel;
use Scayle\Cloud\AdminApi\Models\ChannelCollection;
use Scayle\Cloud\AdminApi\Models\ChannelCreateRequest;
use Scayle\Cloud\AdminApi\Models\ChannelUpdateRequest;

/**
 * @internal
 */
final class ChannelTest extends BaseApiTestCase
{
    public function testCreateChannel(): void
    {
        $expectedRequestJson = $this->loadFixture('ChannelCreateChannelRequest.json');

        $requestEntity = new ChannelCreateRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->channels->createChannel(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ChannelCreateChannelResponse.json');
        self::assertInstanceOf(Channel::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGetChannel(): void
    {
        $responseEntity = $this->api->channels->getChannel(1, 1, []);

        $expectedResponseJson = $this->loadFixture('ChannelGetChannelResponse.json');
        self::assertInstanceOf(Channel::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->channels->all(1, []);

        $expectedResponseJson = $this->loadFixture('ChannelAllResponse.json');
        self::assertInstanceOf(ChannelCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Channel::class, $collectionEntity);

        }
    }

    public function testUpdateChannel(): void
    {
        $expectedRequestJson = $this->loadFixture('ChannelUpdateChannelRequest.json');

        $requestEntity = new ChannelUpdateRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->channels->updateChannel(1, 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ChannelUpdateChannelResponse.json');
        self::assertInstanceOf(Channel::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }
}

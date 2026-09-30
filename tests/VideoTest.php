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

use Scayle\Cloud\AdminApi\Models\Video;
use Scayle\Cloud\AdminApi\Models\VideoCreateResponse;
use Scayle\Cloud\AdminApi\Models\VideoUploadEntity;
use Scayle\Cloud\AdminApi\Models\VideoUploadParameter;

/**
 * @internal
 */
final class VideoTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('VideoCreateRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new Video($entity);
        }

        $responseEntity = $this->api->videos->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VideoCreateResponse.json');
        self::assertInstanceOf(VideoCreateResponse::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'entities', VideoUploadEntity::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('VideoUpdateRequest.json');

        $requestEntity = new Video($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->videos->update('key=acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VideoUpdateResponse.json');
        self::assertInstanceOf(VideoUploadEntity::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'parameters', VideoUploadParameter::class);



    }

    public function testGet(): void
    {
        $responseEntity = $this->api->videos->get('key=acme', []);

        $expectedResponseJson = $this->loadFixture('VideoGetResponse.json');
        self::assertInstanceOf(Video::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->videos->delete('key=acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

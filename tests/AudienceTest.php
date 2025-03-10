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

use Scayle\Cloud\AdminApi\Models\Audience;
use Scayle\Cloud\AdminApi\Models\AudienceCollection;
use Scayle\Cloud\AdminApi\Models\AudienceUpdateRequest;

/**
 * @internal
 */
final class AudienceTest extends BaseApiTestCase
{
    public function testGetAudiences(): void
    {
        $responseEntity = $this->api->audiences->getAudiences([]);

        $expectedResponseJson = $this->loadFixture('AudienceGetAudiencesResponse.json');
        self::assertInstanceOf(AudienceCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Audience::class, $collectionEntity);

        }
    }

    public function testCreateAudience(): void
    {
        $expectedRequestJson = $this->loadFixture('AudienceCreateAudienceRequest.json');

        $requestEntity = new Audience($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->audiences->createAudience($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AudienceCreateAudienceResponse.json');
        self::assertInstanceOf(Audience::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGetAudience(): void
    {
        $responseEntity = $this->api->audiences->getAudience('645e0c241a93369ff53f26e0', []);

        $expectedResponseJson = $this->loadFixture('AudienceGetAudienceResponse.json');
        self::assertInstanceOf(Audience::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteAudience(): void
    {
        $this->api->audiences->deleteAudience('645e0c241a93369ff53f26e0', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateAudience(): void
    {
        $expectedRequestJson = $this->loadFixture('AudienceUpdateAudienceRequest.json');

        $requestEntity = new AudienceUpdateRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->audiences->updateAudience('645e0c241a93369ff53f26e0', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AudienceUpdateAudienceResponse.json');
        self::assertInstanceOf(Audience::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }
}

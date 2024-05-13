<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Audience;
use AboutYou\Cloud\AdminApi\Models\AudienceCollection;
use AboutYou\Cloud\AdminApi\Models\AudienceUpdateRequest;

/**
 * @internal
 */
final class AudienceTest extends BaseApiTestCase
{
    public function testGetAudiences()
    {
        $responseEntity = $this->api->audiences->getAudiences([]);

        $expectedResponseJson = $this->loadFixture('AudienceGetAudiencesResponse.json');
        self::assertInstanceOf(AudienceCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Audience::class, $collectionEntity);
        }
    }

    public function testCreateAudience()
    {
        $expectedRequestJson = $this->loadFixture('AudienceCreateAudienceRequest.json');

        $requestEntity = new Audience($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->audiences->createAudience($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AudienceCreateAudienceResponse.json');
        self::assertInstanceOf(Audience::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGetAudience()
    {
        $responseEntity = $this->api->audiences->getAudience('645e0c241a93369ff53f26e0', []);

        $expectedResponseJson = $this->loadFixture('AudienceGetAudienceResponse.json');
        self::assertInstanceOf(Audience::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDeleteAudience()
    {
        $responseEntity = $this->api->audiences->deleteAudience('645e0c241a93369ff53f26e0', []);
    }

    public function testUpdateAudience()
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

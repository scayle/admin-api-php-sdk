<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Audience;
use AboutYou\Cloud\AdminApi\Models\AudienceCollection;

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
        $responseEntity = $this->api->audiences->getAudience('acme', []);

        $expectedResponseJson = $this->loadFixture('AudienceGetAudienceResponse.json');
        self::assertInstanceOf(Audience::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

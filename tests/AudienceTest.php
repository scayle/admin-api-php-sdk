<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class AudienceTest extends BaseApiTestCase
{
    public function testGetAudiences()
    {
        $responseEntity = $this->api->audiences->getAudiences([]);

        $expectedResponseJson = $this->loadFixture('AudienceGetAudiencesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AudienceCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Audience::class, $collectionEntity);
        }
    }
}

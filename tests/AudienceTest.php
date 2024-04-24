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
}

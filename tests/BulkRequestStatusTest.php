<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\BulkRequestProgress;
use AboutYou\Cloud\AdminApi\Models\BulkRequestStatus;
use AboutYou\Cloud\AdminApi\Models\BulkRequestStatusCollection;

/**
 * @internal
 */
final class BulkRequestStatusTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->bulkRequestStatuses->all([]);

        $expectedResponseJson = $this->loadFixture('BulkRequestStatusAllResponse.json');
        self::assertInstanceOf(BulkRequestStatusCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'progress', BulkRequestProgress::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(BulkRequestStatus::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'progress', BulkRequestProgress::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->bulkRequestStatuses->get(1, []);

        $expectedResponseJson = $this->loadFixture('BulkRequestStatusGetResponse.json');
        self::assertInstanceOf(BulkRequestStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'progress', BulkRequestProgress::class);
    }
}

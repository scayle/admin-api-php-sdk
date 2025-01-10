<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\BulkOperationResponse;
use AboutYou\Cloud\AdminApi\Models\BulkOperationStatus;
use AboutYou\Cloud\AdminApi\Models\BulkRequestStatus;

/**
 * @internal
 */
final class BulkOperationStatusTest extends BaseApiTestCase
{
    public function testGet()
    {
        $responseEntity = $this->api->bulkOperationStatuses->get(1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('BulkOperationStatusGetResponse.json');
        self::assertInstanceOf(BulkOperationStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'response', BulkOperationResponse::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'bulkRequest', BulkRequestStatus::class);
    }
}

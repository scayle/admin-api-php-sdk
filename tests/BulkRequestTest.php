<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\BulkRequestProgress;
use AboutYou\Cloud\AdminApi\Models\BulkRequestStatus;

/**
 * @internal
 */
final class BulkRequestTest extends BaseApiTestCase
{
    public function testCancel()
    {
        $responseEntity = $this->api->bulkRequests->cancel(1, []);

        $expectedResponseJson = $this->loadFixture('BulkRequestCancelResponse.json');
        self::assertInstanceOf(BulkRequestStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'progress', BulkRequestProgress::class);
    }
}

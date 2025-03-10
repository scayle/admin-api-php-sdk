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

use Scayle\Cloud\AdminApi\Models\BulkRequestProgress;
use Scayle\Cloud\AdminApi\Models\BulkRequestStatus;

/**
 * @internal
 */
final class BulkRequestTest extends BaseApiTestCase
{
    public function testCancel(): void
    {
        $responseEntity = $this->api->bulkRequests->cancel(1, []);

        $expectedResponseJson = $this->loadFixture('BulkRequestCancelResponse.json');
        self::assertInstanceOf(BulkRequestStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'progress', BulkRequestProgress::class);



    }
}

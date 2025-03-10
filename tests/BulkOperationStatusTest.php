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

use Scayle\Cloud\AdminApi\Models\BulkOperationResponse;
use Scayle\Cloud\AdminApi\Models\BulkOperationStatus;
use Scayle\Cloud\AdminApi\Models\BulkRequestStatus;

/**
 * @internal
 */
final class BulkOperationStatusTest extends BaseApiTestCase
{
    public function testGet(): void
    {
        $responseEntity = $this->api->bulkOperationStatuses->get(1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('BulkOperationStatusGetResponse.json');
        self::assertInstanceOf(BulkOperationStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'response', BulkOperationResponse::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'bulkRequest', BulkRequestStatus::class);



    }
}

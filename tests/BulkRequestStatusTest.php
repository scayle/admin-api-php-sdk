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
use Scayle\Cloud\AdminApi\Models\BulkRequestStatusCollection;

/**
 * @internal
 */
final class BulkRequestStatusTest extends BaseApiTestCase
{
    public function testAll(): void
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

    public function testGet(): void
    {
        $responseEntity = $this->api->bulkRequestStatuses->get(1, []);

        $expectedResponseJson = $this->loadFixture('BulkRequestStatusGetResponse.json');
        self::assertInstanceOf(BulkRequestStatus::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'progress', BulkRequestProgress::class);



    }
}

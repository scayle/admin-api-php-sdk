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

use Scayle\Cloud\AdminApi\Models\CustomerSegment;
use Scayle\Cloud\AdminApi\Models\CustomerSegmentCollection;

/**
 * @internal
 */
final class CustomerSegmentTest extends BaseApiTestCase
{
    public function testGetCustomerSegments(): void
    {
        $responseEntity = $this->api->customerSegments->getCustomerSegments('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('CustomerSegmentGetCustomerSegmentsResponse.json');
        self::assertInstanceOf(CustomerSegmentCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(CustomerSegment::class, $collectionEntity);

        }
    }

    public function testCreateCustomerSegment(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerSegmentCreateCustomerSegmentRequest.json');

        $requestEntity = new CustomerSegment($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customerSegments->createCustomerSegment('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerSegmentCreateCustomerSegmentResponse.json');
        self::assertInstanceOf(CustomerSegment::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGetCustomerSegment(): void
    {
        $responseEntity = $this->api->customerSegments->getCustomerSegment('acme', 'acme', '3fa85f64-5717-4562-b3fc-2c963f66afa6', []);

        $expectedResponseJson = $this->loadFixture('CustomerSegmentGetCustomerSegmentResponse.json');
        self::assertInstanceOf(CustomerSegment::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateCustomerSegment(): void
    {
        $expectedRequestJson = $this->loadFixture('CustomerSegmentUpdateCustomerSegmentRequest.json');

        $requestEntity = new CustomerSegment($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customerSegments->updateCustomerSegment('acme', 'acme', '3fa85f64-5717-4562-b3fc-2c963f66afa6', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomerSegmentUpdateCustomerSegmentResponse.json');
        self::assertInstanceOf(CustomerSegment::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteCustomerSegment(): void
    {
        $this->api->customerSegments->deleteCustomerSegment('acme', 'acme', '3fa85f64-5717-4562-b3fc-2c963f66afa6', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShipmentTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShipmentCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Shipment($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shipments->Create($requestEntity, []);
    }
}

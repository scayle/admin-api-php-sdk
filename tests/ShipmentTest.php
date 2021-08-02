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

        $expectedResponseJson = $this->loadFixture('ShipmentCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Shipment::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', \AboutYou\Cloud\AdminApi\Models\ShipmentOrderItem::class);
    }
}

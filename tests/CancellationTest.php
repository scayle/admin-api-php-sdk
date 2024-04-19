<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Cancellation;

/**
 * @internal
 */
final class CancellationTest extends BaseApiTestCase
{
    public function testSend()
    {
        $expectedRequestJson = $this->loadFixture('CancellationSendRequest.json');

        $requestEntity = new Cancellation($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->cancellations->send($requestEntity, []);
    }
}

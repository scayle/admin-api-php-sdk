<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class CancellationTest extends BaseApiTestCase
{
    public function testSend()
    {
        $expectedRequestJson = $this->loadFixture('CancellationSendRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Cancellation($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->cancellations->Send($requestEntity, []);
    }
}

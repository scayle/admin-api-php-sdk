<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Email;

/**
 * @internal
 */
final class EmailTest extends BaseApiTestCase
{
    public function testSend()
    {
        $expectedRequestJson = $this->loadFixture('EmailSendRequest.json');

        $requestEntity = new Email($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->emails->send('acme', 'acme', $requestEntity, []);
    }
}

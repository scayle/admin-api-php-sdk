<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ReturnItemTest extends BaseApiTestCase
{
    public function testSend()
    {
        $expectedRequestJson = $this->loadFixture('ReturnItemSendRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new \AboutYou\Cloud\AdminApi\Models\ReturnItem($entity);
        }

        $responseEntity = $this->api->returnItems->Send($requestEntity, []);
    }
}

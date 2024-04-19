<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ReturnItem;

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
            $requestEntity[] = new ReturnItem($entity);
        }

        $responseEntity = $this->api->returnItems->send($requestEntity, []);
    }
}

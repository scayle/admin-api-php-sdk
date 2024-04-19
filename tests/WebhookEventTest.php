<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\WebhookEvent;
use AboutYou\Cloud\AdminApi\Models\WebhookEventCollection;

/**
 * @internal
 */
final class WebhookEventTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->webhookEvents->all([]);

        $expectedResponseJson = $this->loadFixture('WebhookEventAllResponse.json');
        self::assertInstanceOf(WebhookEventCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(WebhookEvent::class, $collectionEntity);
        }
    }
}

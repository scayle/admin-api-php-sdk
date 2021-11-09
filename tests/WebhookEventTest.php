<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class WebhookEventTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->webhookEvents->all([]);

        $expectedResponseJson = $this->loadFixture('WebhookEventAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\WebhookEventCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\WebhookEvent::class, $collectionEntity);
        }
    }
}

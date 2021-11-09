<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class WebhookSubscriptionTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('WebhookSubscriptionCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\WebhookSubscription($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookSubscriptions->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\WebhookSubscription::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGet()
    {
        $responseEntity = $this->api->webhookSubscriptions->get(1, []);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\WebhookSubscription::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->webhookSubscriptions->all([]);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\WebhookSubscriptionCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\WebhookSubscription::class, $collectionEntity);
        }
    }

    public function testDelete()
    {
        $responseEntity = $this->api->webhookSubscriptions->delete(1, []);
    }
}

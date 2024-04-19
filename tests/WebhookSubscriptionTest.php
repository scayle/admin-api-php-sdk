<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\WebhookSubscription;
use AboutYou\Cloud\AdminApi\Models\WebhookSubscriptionCollection;

/**
 * @internal
 */
final class WebhookSubscriptionTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('WebhookSubscriptionCreateRequest.json');

        $requestEntity = new WebhookSubscription($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookSubscriptions->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionCreateResponse.json');
        self::assertInstanceOf(WebhookSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGet()
    {
        $responseEntity = $this->api->webhookSubscriptions->get(1, []);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionGetResponse.json');
        self::assertInstanceOf(WebhookSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->webhookSubscriptions->all([]);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionAllResponse.json');
        self::assertInstanceOf(WebhookSubscriptionCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(WebhookSubscription::class, $collectionEntity);
        }
    }

    public function testDelete()
    {
        $responseEntity = $this->api->webhookSubscriptions->delete(1, []);
    }
}

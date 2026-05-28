<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Models\WebhookProducerEvent;
use Scayle\Cloud\AdminApi\Models\WebhookProducerEventCollection;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscription;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscriptionBasicAuth;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscriptionCollection;

/**
 * @internal
 */
final class WebhookProducerTest extends BaseApiTestCase
{
    public function testAllEvents(): void
    {
        $responseEntity = $this->api->webhookProducers->allEvents('acme', []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerAllEventsResponse.json');
        self::assertInstanceOf(WebhookProducerEventCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(WebhookProducerEvent::class, $collectionEntity);

        }
    }

    public function testAllSubscriptions(): void
    {
        $responseEntity = $this->api->webhookProducers->allSubscriptions('acme', []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerAllSubscriptionsResponse.json');
        self::assertInstanceOf(WebhookProducerSubscriptionCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'auth', WebhookProducerSubscriptionBasicAuth::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(WebhookProducerSubscription::class, $collectionEntity);

        }
    }

    public function testCreateSubscription(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookProducerCreateSubscriptionRequest.json');

        $requestEntity = new WebhookProducerSubscription($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookProducers->createSubscription('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerCreateSubscriptionResponse.json');
        self::assertInstanceOf(WebhookProducerSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'auth', WebhookProducerSubscriptionBasicAuth::class);



    }

    public function testGetSubscription(): void
    {
        $responseEntity = $this->api->webhookProducers->getSubscription('acme', 1, []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerGetSubscriptionResponse.json');
        self::assertInstanceOf(WebhookProducerSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'auth', WebhookProducerSubscriptionBasicAuth::class);



    }

    public function testUpdateSubscription(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookProducerUpdateSubscriptionRequest.json');

        $requestEntity = new WebhookProducerSubscription($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookProducers->updateSubscription('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerUpdateSubscriptionResponse.json');
        self::assertInstanceOf(WebhookProducerSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'auth', WebhookProducerSubscriptionBasicAuth::class);



    }

    public function testDeleteSubscription(): void
    {
        $this->api->webhookProducers->deleteSubscription('acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

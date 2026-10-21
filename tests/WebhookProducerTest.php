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

use Scayle\Cloud\AdminApi\Models\WebhookProducer;
use Scayle\Cloud\AdminApi\Models\WebhookProducerCollection;
use Scayle\Cloud\AdminApi\Models\WebhookProducerEvent;
use Scayle\Cloud\AdminApi\Models\WebhookProducerEventCollection;
use Scayle\Cloud\AdminApi\Models\WebhookProducerRegistration;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscription;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscriptionBasicAuth;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscriptionCollection;
use Scayle\Cloud\AdminApi\Models\WebhookProducerWebhook;
use Scayle\Cloud\AdminApi\Models\WebhookProducerWebhookIdentity;

/**
 * @internal
 */
final class WebhookProducerTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->webhookProducers->all([]);

        $expectedResponseJson = $this->loadFixture('WebhookProducerAllResponse.json');
        self::assertInstanceOf(WebhookProducerCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(WebhookProducer::class, $collectionEntity);

        }
    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookProducerCreateRequest.json');

        $requestEntity = new WebhookProducerRegistration($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookProducers->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerCreateResponse.json');
        self::assertInstanceOf(WebhookProducerRegistration::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

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

    public function testCreateEvent(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookProducerCreateEventRequest.json');

        $requestEntity = new WebhookProducerEvent($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookProducers->createEvent('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerCreateEventResponse.json');
        self::assertInstanceOf(WebhookProducerEvent::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateEvent(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookProducerUpdateEventRequest.json');

        $requestEntity = new WebhookProducerEvent($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookProducers->updateEvent('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerUpdateEventResponse.json');
        self::assertInstanceOf(WebhookProducerEvent::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteEvent(): void
    {
        $this->api->webhookProducers->deleteEvent('acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testCreateWebhook(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookProducerCreateWebhookRequest.json');

        $requestEntity = new WebhookProducerWebhook($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookProducers->createWebhook('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookProducerCreateWebhookResponse.json');
        self::assertInstanceOf(WebhookProducerWebhookIdentity::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




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

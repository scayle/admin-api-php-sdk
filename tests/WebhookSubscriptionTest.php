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

use Scayle\Cloud\AdminApi\Models\WebhookSubscription;
use Scayle\Cloud\AdminApi\Models\WebhookSubscriptionCollection;
use Scayle\Cloud\AdminApi\Models\WebhookSubscriptionPatch;

/**
 * @internal
 */
final class WebhookSubscriptionTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookSubscriptionCreateRequest.json');

        $requestEntity = new WebhookSubscription($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookSubscriptions->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionCreateResponse.json');
        self::assertInstanceOf(WebhookSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('WebhookSubscriptionUpdateRequest.json');

        $requestEntity = new WebhookSubscriptionPatch($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->webhookSubscriptions->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionUpdateResponse.json');
        self::assertInstanceOf(WebhookSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGet(): void
    {
        $responseEntity = $this->api->webhookSubscriptions->get(1, []);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionGetResponse.json');
        self::assertInstanceOf(WebhookSubscription::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->webhookSubscriptions->all([]);

        $expectedResponseJson = $this->loadFixture('WebhookSubscriptionAllResponse.json');
        self::assertInstanceOf(WebhookSubscriptionCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(WebhookSubscription::class, $collectionEntity);

        }
    }

    public function testDelete(): void
    {
        $this->api->webhookSubscriptions->delete(1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

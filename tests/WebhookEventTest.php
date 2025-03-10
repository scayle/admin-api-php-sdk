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

use Scayle\Cloud\AdminApi\Models\WebhookEvent;
use Scayle\Cloud\AdminApi\Models\WebhookEventCollection;

/**
 * @internal
 */
final class WebhookEventTest extends BaseApiTestCase
{
    public function testAll(): void
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

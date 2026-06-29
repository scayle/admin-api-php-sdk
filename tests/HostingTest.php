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

use Scayle\Cloud\AdminApi\Models\PurgeAllRequest;
use Scayle\Cloud\AdminApi\Models\PurgeUrlPrefixesRequest;

/**
 * @internal
 */
final class HostingTest extends BaseApiTestCase
{
    public function testPurgeCdnCacheForAllUrls(): void
    {
        $expectedRequestJson = $this->loadFixture('HostingPurgeCdnCacheForAllUrlsRequest.json');

        $requestEntity = new PurgeAllRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $this->api->hostings->purgeCdnCacheForAllUrls('acme', 'acme', $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testPurgeCdnCacheForUrlPrefixes(): void
    {
        $expectedRequestJson = $this->loadFixture('HostingPurgeCdnCacheForUrlPrefixesRequest.json');

        $requestEntity = new PurgeUrlPrefixesRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $this->api->hostings->purgeCdnCacheForUrlPrefixes('acme', 'acme', $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

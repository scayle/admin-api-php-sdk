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

use Scayle\Cloud\AdminApi\Models\ReturnItem;

/**
 * @internal
 */
final class ReturnItemTest extends BaseApiTestCase
{
    public function testSend(): void
    {
        $expectedRequestJson = $this->loadFixture('ReturnItemSendRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ReturnItem($entity);
        }

        $this->api->returnItems->send($requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

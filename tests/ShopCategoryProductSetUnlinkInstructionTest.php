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

use Scayle\Cloud\AdminApi\Models\ShopCategoryProductSetUnlinkInstruction;

/**
 * @internal
 */
final class ShopCategoryProductSetUnlinkInstructionTest extends BaseApiTestCase
{
    public function testUnlink(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryProductSetUnlinkInstructionUnlinkRequest.json');

        $requestEntity = new ShopCategoryProductSetUnlinkInstruction($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $this->api->shopCategoryProductSetUnlinkInstructions->unlink('acme', 1, $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

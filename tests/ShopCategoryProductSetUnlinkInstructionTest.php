<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSetUnlinkInstruction;

/**
 * @internal
 */
final class ShopCategoryProductSetUnlinkInstructionTest extends BaseApiTestCase
{
    public function testUnlink()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryProductSetUnlinkInstructionUnlinkRequest.json');

        $requestEntity = new ShopCategoryProductSetUnlinkInstruction($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryProductSetUnlinkInstructions->unlink('acme', 1, $requestEntity, []);
    }
}

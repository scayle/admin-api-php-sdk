<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShopCategoryProductSetUnlinkInstructionTest extends BaseApiTestCase
{
    public function testUnlink()
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryProductSetUnlinkInstructionUnlinkRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSetUnlinkInstruction($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryProductSetUnlinkInstructions->unlink('acme', 1, $requestEntity, []);
    }
}

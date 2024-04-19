<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Asset;
use AboutYou\Cloud\AdminApi\Models\AssetSource;
use AboutYou\Cloud\AdminApi\Models\AssetUrl;

/**
 * @internal
 */
final class AssetTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('AssetCreateRequest.json');

        $requestEntity = new Asset($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->assets->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AssetCreateResponse.json');
        self::assertInstanceOf(AssetUrl::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', AssetSource::class);
    }
}

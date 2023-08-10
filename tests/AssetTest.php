<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class AssetTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('AssetCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Asset($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->assets->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AssetCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AssetUrl::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
    }
}

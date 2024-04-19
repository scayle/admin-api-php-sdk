<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\CustomDataConfig;

/**
 * @internal
 */
final class CustomDataConfigTest extends BaseApiTestCase
{
    public function testGet()
    {
        $responseEntity = $this->api->customDataConfigs->get('acme', []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigGetResponse.json');
        self::assertInstanceOf(CustomDataConfig::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CustomDataConfigCreateRequest.json');

        $requestEntity = new CustomDataConfig($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customDataConfigs->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigCreateResponse.json');
        self::assertInstanceOf(CustomDataConfig::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CustomDataConfigUpdateRequest.json');

        $requestEntity = new CustomDataConfig($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customDataConfigs->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigUpdateResponse.json');
        self::assertInstanceOf(CustomDataConfig::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->customDataConfigs->delete('acme', []);
    }
}

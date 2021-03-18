<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class CustomDataConfigTest extends BaseApiTestCase
{
    public function testGet()
    {
        $responseEntity = $this->api->customDataConfigs->Get('1', []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomDataConfig::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CustomDataConfigCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomDataConfig($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customDataConfigs->Create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomDataConfig::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CustomDataConfigUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\CustomDataConfig($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->customDataConfigs->Update('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CustomDataConfigUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CustomDataConfig::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->customDataConfigs->Delete('1', []);
    }
}

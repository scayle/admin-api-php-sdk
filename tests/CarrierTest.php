<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class CarrierTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->carriers->all([]);

        $expectedResponseJson = $this->loadFixture('CarrierAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CarrierCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Carrier::class, $collectionEntity);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->carriers->get(1, []);

        $expectedResponseJson = $this->loadFixture('CarrierGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Carrier::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CarrierCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Carrier($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->carriers->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CarrierCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Carrier::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CarrierUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Carrier($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->carriers->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CarrierUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Carrier::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

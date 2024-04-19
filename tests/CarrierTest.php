<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Carrier;
use AboutYou\Cloud\AdminApi\Models\CarrierCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class CarrierTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->carriers->all([]);

        $expectedResponseJson = $this->loadFixture('CarrierAllResponse.json');
        self::assertInstanceOf(CarrierCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Carrier::class, $collectionEntity);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->carriers->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CarrierGetResponse.json');
        self::assertInstanceOf(Carrier::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CarrierCreateRequest.json');

        $requestEntity = new Carrier($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->carriers->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CarrierCreateResponse.json');
        self::assertInstanceOf(Carrier::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CarrierUpdateRequest.json');

        $requestEntity = new Carrier($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->carriers->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CarrierUpdateResponse.json');
        self::assertInstanceOf(Carrier::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class MerchantTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->merchants->all([]);

        $expectedResponseJson = $this->loadFixture('MerchantAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MerchantCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $collectionEntity);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->merchants->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MerchantGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('MerchantCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Merchant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('MerchantUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Merchant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->merchants->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MerchantUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Merchant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\EmailKey;
use AboutYou\Cloud\AdminApi\Models\EmailKeyCollection;

/**
 * @internal
 */
final class EmailKeyTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('EmailKeyCreateRequest.json');

        $requestEntity = new EmailKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->emailKeys->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('EmailKeyCreateResponse.json');
        self::assertInstanceOf(EmailKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('EmailKeyUpdateRequest.json');

        $requestEntity = new EmailKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->emailKeys->update('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('EmailKeyUpdateResponse.json');
        self::assertInstanceOf(EmailKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->emailKeys->delete('acme', 'acme', 1, []);
    }

    public function testGet()
    {
        $responseEntity = $this->api->emailKeys->get('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('EmailKeyGetResponse.json');
        self::assertInstanceOf(EmailKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->emailKeys->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('EmailKeyAllResponse.json');
        self::assertInstanceOf(EmailKeyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(EmailKey::class, $collectionEntity);
        }
    }
}

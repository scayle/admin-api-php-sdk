<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class CompanyTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CompanyCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Company($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->companies->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CompanyCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Company::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->companies->all([]);

        $expectedResponseJson = $this->loadFixture('CompanyAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\CompanyCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Company::class, $collectionEntity);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->companies->get(1, []);

        $expectedResponseJson = $this->loadFixture('CompanyGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Company::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CompanyUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Company($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->companies->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CompanyUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Company::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

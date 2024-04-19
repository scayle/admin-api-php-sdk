<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Company;
use AboutYou\Cloud\AdminApi\Models\CompanyCollection;

/**
 * @internal
 */
final class CompanyTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('CompanyCreateRequest.json');

        $requestEntity = new Company($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->companies->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CompanyCreateResponse.json');
        self::assertInstanceOf(Company::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->companies->all([]);

        $expectedResponseJson = $this->loadFixture('CompanyAllResponse.json');
        self::assertInstanceOf(CompanyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Company::class, $collectionEntity);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->companies->get(1, []);

        $expectedResponseJson = $this->loadFixture('CompanyGetResponse.json');
        self::assertInstanceOf(Company::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('CompanyUpdateRequest.json');

        $requestEntity = new Company($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->companies->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CompanyUpdateResponse.json');
        self::assertInstanceOf(Company::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

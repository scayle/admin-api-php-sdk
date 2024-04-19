<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\MasterCategory;
use AboutYou\Cloud\AdminApi\Models\MasterCategoryAttribute;
use AboutYou\Cloud\AdminApi\Models\MasterCategoryCollection;

/**
 * @internal
 */
final class MasterCategoryTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->masterCategories->all([]);

        $expectedResponseJson = $this->loadFixture('MasterCategoryAllResponse.json');
        self::assertInstanceOf(MasterCategoryCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(MasterCategory::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', MasterCategoryAttribute::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->masterCategories->get(1, []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryGetResponse.json');
        self::assertInstanceOf(MasterCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('MasterCategoryCreateRequest.json');

        $requestEntity = new MasterCategory($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masterCategories->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryCreateResponse.json');
        self::assertInstanceOf(MasterCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('MasterCategoryUpdateRequest.json');

        $requestEntity = new MasterCategory($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masterCategories->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryUpdateResponse.json');
        self::assertInstanceOf(MasterCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->masterCategories->delete(1, []);
    }
}

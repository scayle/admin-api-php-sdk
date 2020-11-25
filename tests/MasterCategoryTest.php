<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class MasterCategoryTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->masterCategories->All([]);

        $expectedResponseJson = $this->loadFixture('MasterCategoryAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MasterCategoryCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MasterCategory::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\MasterCategoryAttribute::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->masterCategories->Get('1', []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MasterCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\MasterCategoryAttribute::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('MasterCategoryCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\MasterCategory($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masterCategories->Create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\MasterCategory::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\MasterCategoryAttribute::class);
    }
}

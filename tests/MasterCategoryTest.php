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
}

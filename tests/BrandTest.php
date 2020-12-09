<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class BrandTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->brands->All([]);

        $expectedResponseJson = $this->loadFixture('BrandAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\BrandCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Brand::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->brands->Get('1', []);

        $expectedResponseJson = $this->loadFixture('BrandGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Brand::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }
}

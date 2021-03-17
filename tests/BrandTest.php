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

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Brand::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->brands->Get('1', []);

        $expectedResponseJson = $this->loadFixture('BrandGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Brand::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('BrandCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Brand($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->brands->Create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Brand::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('BrandUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Brand($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->brands->Update('1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Brand::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->brands->Delete('1', []);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class BrandTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->brands->all([]);

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
        $responseEntity = $this->api->brands->get(1, []);

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

        $responseEntity = $this->api->brands->create($requestEntity, []);

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

        $responseEntity = $this->api->brands->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Brand::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'logoSource', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->brands->delete(1, []);
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('BrandCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->brands->createOrUpdateCustomData(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandCreateOrUpdateCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->brands->deleteCustomData(1, []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->brands->getCustomData(1, []);

        $expectedResponseJson = $this->loadFixture('BrandGetCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('BrandCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->brands->createOrUpdateCustomDataForKey(1, 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('BrandCreateOrUpdateCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->brands->deleteCustomDataForKey(1, 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->brands->getCustomDataForKey(1, 'acme', []);

        $expectedResponseJson = $this->loadFixture('BrandGetCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), \json_encode($responseEntity));
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class ProductImageTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductImageCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductImage($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductImageCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImage::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->productImages->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductImageAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImageCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImage::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        }
    }

    public function testUpdatePosition()
    {
        $expectedRequestJson = $this->loadFixture('ProductImageUpdatePositionRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductImagePosition($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->updatePosition(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductImageUpdatePositionResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImage::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->productImages->delete(Identifier::fromId(1), Identifier::fromId(1), []);
    }

    public function testUpdateOrCreateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('ProductImageUpdateOrCreateAttributeRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Attribute($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->updateOrCreateAttribute(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductImageUpdateOrCreateAttributeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testDeleteAttribute()
    {
        $responseEntity = $this->api->productImages->deleteAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);
    }

    public function testGetAttribute()
    {
        $responseEntity = $this->api->productImages->getAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductImageGetAttributeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testAllAttributes()
    {
        $responseEntity = $this->api->productImages->allAttributes(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductImageAllAttributesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'source', \AboutYou\Cloud\AdminApi\Models\AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        }
    }
}

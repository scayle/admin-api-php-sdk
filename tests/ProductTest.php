<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class ProductTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Product($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
    }

    public function testGet()
    {
        $responseEntity = $this->api->products->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->products->all([]);

        $expectedResponseJson = $this->loadFixture('ProductAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Product($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->products->delete(Identifier::fromId(1), []);
    }

    public function testUpdateOrCreateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateOrCreateAttributeRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Attribute($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateOrCreateAttribute(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateOrCreateAttributeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
    }

    public function testDeleteAttribute()
    {
        $responseEntity = $this->api->products->deleteAttribute(Identifier::fromId(1), 'acme', []);
    }

    public function testGetAttribute()
    {
        $responseEntity = $this->api->products->getAttribute(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductGetAttributeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
    }

    public function testAllAttributes()
    {
        $responseEntity = $this->api->products->allAttributes(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductAllAttributesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
        }
    }

    public function testUpdateMasterCategories()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateMasterCategoriesRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductMasterCategories($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateMasterCategories(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateMasterCategoriesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductMasterCategories::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', \AboutYou\Cloud\AdminApi\Models\ProductSorting::class);
    }
}

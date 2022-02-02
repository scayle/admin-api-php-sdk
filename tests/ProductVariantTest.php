<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class ProductVariantTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testGet()
    {
        $responseEntity = $this->api->productVariants->get(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariants->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->update(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->productVariants->delete(Identifier::fromId(1), Identifier::fromId(1), []);
    }

    public function testUpdateOrCreateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateOrCreateAttributeRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Attribute($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->updateOrCreateAttribute(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateOrCreateAttributeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testDeleteAttribute()
    {
        $responseEntity = $this->api->productVariants->deleteAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);
    }

    public function testGetAttribute()
    {
        $responseEntity = $this->api->productVariants->getAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetAttributeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
    }

    public function testAllAttributes()
    {
        $responseEntity = $this->api->productVariants->allAttributes(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllAttributesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        }
    }
}

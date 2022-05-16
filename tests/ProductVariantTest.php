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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
    }

    public function testGet()
    {
        $responseEntity = $this->api->productVariants->get(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariants->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
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
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
    }

    public function testAllAttributes()
    {
        $responseEntity = $this->api->productVariants->allAttributes(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllAttributesResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
        }
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->productVariants->createOrUpdateCustomData(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->productVariants->deleteCustomData(Identifier::fromId(1), []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->productVariants->getCustomData(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetCustomDataResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->productVariants->createOrUpdateCustomDataForKey(Identifier::fromId(1), 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->productVariants->deleteCustomDataForKey(Identifier::fromId(1), 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->productVariants->getCustomDataForKey(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetCustomDataForKeyResponse.json');
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateComposite()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateCompositeRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->createComposite(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateCompositeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
    }

    public function testUpdateComposite()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateCompositeRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariant($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->updateComposite(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateCompositeResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', \AboutYou\Cloud\AdminApi\Models\RelatedProductVariant::class);
    }

    public function testDeleteComposite()
    {
        $responseEntity = $this->api->productVariants->deleteComposite(Identifier::fromId(1), Identifier::fromId(1), []);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

class ProductVariantTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariant($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->Create(Identifier::fromId(1), $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);


    }

    public function testGet()
    {
        $responseEntity = $this->api->productVariants->Get(Identifier::fromId(1), Identifier::fromId(1),  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);


    }

    public function testAll()
    {
        $responseEntity = $this->api->productVariants->All(Identifier::fromId(1),  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariantCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);

        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductVariant($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->Update(Identifier::fromId(1), Identifier::fromId(1), $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);


    }

    public function testDelete()
    {
        $responseEntity = $this->api->productVariants->Delete(Identifier::fromId(1), Identifier::fromId(1),  []);

    }

    public function testUpdateOrCreateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateOrCreateAttributeRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Attribute($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->UpdateOrCreateAttribute(Identifier::fromId(1), Identifier::fromId(1), $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateOrCreateAttributeResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);


    }

    public function testDeleteAttribute()
    {
        $responseEntity = $this->api->productVariants->DeleteAttribute(Identifier::fromId(1), Identifier::fromId(1), '1',  []);

    }

    public function testGetAttribute()
    {
        $responseEntity = $this->api->productVariants->GetAttribute(Identifier::fromId(1), Identifier::fromId(1), '1',  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetAttributeResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);


    }

    public function testAllAttributes()
    {
        $responseEntity = $this->api->productVariants->AllAttributes(Identifier::fromId(1), Identifier::fromId(1),  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllAttributesResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\AttributeCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', \AboutYou\Cloud\AdminApi\Models\Attribute::class);

        }
    }

}
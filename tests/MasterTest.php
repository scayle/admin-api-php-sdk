<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Attribute;
use AboutYou\Cloud\AdminApi\Models\AttributeCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductMasterCategories;

/**
 * @internal
 */
final class MasterTest extends BaseApiTestCase
{
    public function testUpdateProductMasterMasterCategories()
    {
        $expectedRequestJson = $this->loadFixture('MasterUpdateProductMasterMasterCategoriesRequest.json');

        $requestEntity = new ProductMasterCategories($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masters->updateProductMasterMasterCategories(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterUpdateProductMasterMasterCategoriesResponse.json');
        self::assertInstanceOf(ProductMasterCategories::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'categories', ProductMasterCategories::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
    }

    public function testAllAttributes()
    {
        $responseEntity = $this->api->masters->allAttributes(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MasterAllAttributesResponse.json');
        self::assertInstanceOf(AttributeCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'categories', ProductMasterCategories::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'categories', ProductMasterCategories::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);
        }
    }

    public function testUpdateOrCreateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('MasterUpdateOrCreateAttributeRequest.json');

        $requestEntity = new Attribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masters->updateOrCreateAttribute(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterUpdateOrCreateAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'categories', ProductMasterCategories::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
    }

    public function testGetAttribute()
    {
        $responseEntity = $this->api->masters->getAttribute(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('MasterGetAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'categories', ProductMasterCategories::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
    }

    public function testDeleteAttribute()
    {
        $responseEntity = $this->api->masters->deleteAttribute(Identifier::fromId(1), 'acme', []);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Attribute;
use AboutYou\Cloud\AdminApi\Models\AttributeCollection;
use AboutYou\Cloud\AdminApi\Models\BulkRequest;
use AboutYou\Cloud\AdminApi\Models\CreateBulkRequest;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Master;
use AboutYou\Cloud\AdminApi\Models\Product;
use AboutYou\Cloud\AdminApi\Models\ProductCollection;
use AboutYou\Cloud\AdminApi\Models\ProductImage;
use AboutYou\Cloud\AdminApi\Models\ProductMasterCategories;
use AboutYou\Cloud\AdminApi\Models\ProductSorting;
use AboutYou\Cloud\AdminApi\Models\ProductState;
use AboutYou\Cloud\AdminApi\Models\ProductVariant;

/**
 * @internal
 */
final class ProductTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateRequest.json');

        $requestEntity = new Product($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateResponse.json');
        self::assertInstanceOf(Product::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', ProductSorting::class);
    }

    public function testGet()
    {
        $responseEntity = $this->api->products->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductGetResponse.json');
        self::assertInstanceOf(Product::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', ProductSorting::class);
    }

    public function testAll()
    {
        $responseEntity = $this->api->products->all([]);

        $expectedResponseJson = $this->loadFixture('ProductAllResponse.json');
        self::assertInstanceOf(ProductCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', ProductSorting::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Product::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'master', Master::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'variants', ProductVariant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'images', ProductImage::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSortings', ProductSorting::class);
        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateRequest.json');

        $requestEntity = new Product($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateResponse.json');
        self::assertInstanceOf(Product::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', ProductSorting::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->products->delete(Identifier::fromId(1), []);
    }

    public function testUpdateOrCreateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateOrCreateAttributeRequest.json');

        $requestEntity = new Attribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateOrCreateAttribute(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateOrCreateAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDeleteAttribute()
    {
        $responseEntity = $this->api->products->deleteAttribute(Identifier::fromId(1), 'acme', []);
    }

    public function testGetAttribute()
    {
        $responseEntity = $this->api->products->getAttribute(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductGetAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAllAttributes()
    {
        $responseEntity = $this->api->products->allAttributes(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductAllAttributesResponse.json');
        self::assertInstanceOf(AttributeCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'master', Master::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'variants', ProductVariant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'images', ProductImage::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'productSortings', ProductSorting::class);
        }
    }

    public function testUpdateMasterCategories()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateMasterCategoriesRequest.json');

        $requestEntity = new ProductMasterCategories($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateMasterCategories(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateMasterCategoriesResponse.json');
        self::assertInstanceOf(ProductMasterCategories::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreateOrUpdateCustomData()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->products->createOrUpdateCustomData(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomData()
    {
        $responseEntity = $this->api->products->deleteCustomData(Identifier::fromId(1), []);
    }

    public function testGetCustomData()
    {
        $responseEntity = $this->api->products->getCustomData(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateOrUpdateCustomDataForKey()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->products->createOrUpdateCustomDataForKey(Identifier::fromId(1), 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testDeleteCustomDataForKey()
    {
        $responseEntity = $this->api->products->deleteCustomDataForKey(Identifier::fromId(1), 'acme', []);
    }

    public function testGetCustomDataForKey()
    {
        $responseEntity = $this->api->products->getCustomDataForKey(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));
    }

    public function testCreateComposite()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateCompositeRequest.json');

        $requestEntity = new Product($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->createComposite($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateCompositeResponse.json');
        self::assertInstanceOf(Product::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', ProductSorting::class);
    }

    public function testUpdateComposite()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateCompositeRequest.json');

        $requestEntity = new Product($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateComposite(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateCompositeResponse.json');
        self::assertInstanceOf(Product::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', ProductImage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'productSortings', ProductSorting::class);
    }

    public function testDeleteComposite()
    {
        $responseEntity = $this->api->products->deleteComposite(Identifier::fromId(1), []);
    }

    public function testUpdateState()
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateStateRequest.json');

        $requestEntity = new ProductState($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateState(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateStateResponse.json');
        self::assertInstanceOf(ProductState::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreateBulkRequest()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateBulkRequestRequest.json');

        $requestEntity = new CreateBulkRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->createBulkRequest($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateBulkRequestResponse.json');
        self::assertInstanceOf(BulkRequest::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreateCompositeProductBulkRequest()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateCompositeProductBulkRequestRequest.json');

        $requestEntity = new CreateBulkRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->createCompositeProductBulkRequest($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateCompositeProductBulkRequestResponse.json');
        self::assertInstanceOf(BulkRequest::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

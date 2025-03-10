<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Models\Attribute;
use Scayle\Cloud\AdminApi\Models\AttributeCollection;
use Scayle\Cloud\AdminApi\Models\BulkRequest;
use Scayle\Cloud\AdminApi\Models\CreateBulkRequest;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Master;
use Scayle\Cloud\AdminApi\Models\Product;
use Scayle\Cloud\AdminApi\Models\ProductCollection;
use Scayle\Cloud\AdminApi\Models\ProductImage;
use Scayle\Cloud\AdminApi\Models\ProductMasterCategories;
use Scayle\Cloud\AdminApi\Models\ProductSorting;
use Scayle\Cloud\AdminApi\Models\ProductState;
use Scayle\Cloud\AdminApi\Models\ProductVariant;

/**
 * @internal
 */
final class ProductTest extends BaseApiTestCase
{
    public function testCreate(): void
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

    public function testGet(): void
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

    public function testAll(): void
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

    public function testUpdate(): void
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

    public function testDelete(): void
    {
        $this->api->products->delete(Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateOrCreateAttribute(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateOrCreateAttributeRequest.json');

        $requestEntity = new Attribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateOrCreateAttribute(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateOrCreateAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteAttribute(): void
    {
        $this->api->products->deleteAttribute(Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetAttribute(): void
    {
        $responseEntity = $this->api->products->getAttribute(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductGetAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAllAttributes(): void
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

    public function testUpdateMasterCategories(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateMasterCategoriesRequest.json');

        $requestEntity = new ProductMasterCategories($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateMasterCategories(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateMasterCategoriesResponse.json');
        self::assertInstanceOf(ProductMasterCategories::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreateOrUpdateCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->products->createOrUpdateCustomData(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomData(): void
    {
        $this->api->products->deleteCustomData(Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomData(): void
    {
        $responseEntity = $this->api->products->getCustomData(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForKey(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->products->createOrUpdateCustomDataForKey(Identifier::fromId(1), 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForKey(): void
    {
        $this->api->products->deleteCustomDataForKey(Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForKey(): void
    {
        $responseEntity = $this->api->products->getCustomDataForKey(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateComposite(): void
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

    public function testUpdateComposite(): void
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

    public function testDeleteComposite(): void
    {
        $this->api->products->deleteComposite(Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateState(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductUpdateStateRequest.json');

        $requestEntity = new ProductState($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->updateState(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateStateResponse.json');
        self::assertInstanceOf(ProductState::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreateBulkRequest(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateBulkRequestRequest.json');

        $requestEntity = new CreateBulkRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->createBulkRequest($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductCreateBulkRequestResponse.json');
        self::assertInstanceOf(BulkRequest::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreateCompositeProductBulkRequest(): void
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

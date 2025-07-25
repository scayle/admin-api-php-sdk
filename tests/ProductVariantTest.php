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
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\ProductVariant;
use Scayle\Cloud\AdminApi\Models\ProductVariantCollection;
use Scayle\Cloud\AdminApi\Models\ProductVariantPrice;
use Scayle\Cloud\AdminApi\Models\RelatedProductVariant;

/**
 * @internal
 */
final class ProductVariantTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateRequest.json');

        $requestEntity = new ProductVariant($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateResponse.json');
        self::assertInstanceOf(ProductVariant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', RelatedProductVariant::class);



    }

    public function testGet(): void
    {
        $responseEntity = $this->api->productVariants->get(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetResponse.json');
        self::assertInstanceOf(ProductVariant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', RelatedProductVariant::class);



    }

    public function testAll(): void
    {
        $responseEntity = $this->api->productVariants->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllResponse.json');
        self::assertInstanceOf(ProductVariantCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', RelatedProductVariant::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductVariant::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'relatedVariants', RelatedProductVariant::class);

        }
    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateRequest.json');

        $requestEntity = new ProductVariant($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->update(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateResponse.json');
        self::assertInstanceOf(ProductVariant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', RelatedProductVariant::class);



    }

    public function testDelete(): void
    {
        $this->api->productVariants->delete(Identifier::fromId(1), Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateOrCreateAttribute(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateOrCreateAttributeRequest.json');

        $requestEntity = new Attribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->updateOrCreateAttribute(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateOrCreateAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteAttribute(): void
    {
        $this->api->productVariants->deleteAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetAttribute(): void
    {
        $responseEntity = $this->api->productVariants->getAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAllAttributes(): void
    {
        $responseEntity = $this->api->productVariants->allAttributes(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantAllAttributesResponse.json');
        self::assertInstanceOf(AttributeCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'prices', ProductVariantPrice::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'relatedVariants', RelatedProductVariant::class);

        }
    }

    public function testCreateOrUpdateCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->productVariants->createOrUpdateCustomData(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomData(): void
    {
        $this->api->productVariants->deleteCustomData(Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomData(): void
    {
        $responseEntity = $this->api->productVariants->getCustomData(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetCustomDataResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateOrUpdateCustomDataForKey(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataForKeyRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->productVariants->createOrUpdateCustomDataForKey(Identifier::fromId(1), 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateOrUpdateCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testDeleteCustomDataForKey(): void
    {
        $this->api->productVariants->deleteCustomDataForKey(Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCustomDataForKey(): void
    {
        $responseEntity = $this->api->productVariants->getCustomDataForKey(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetCustomDataForKeyResponse.json');
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), json_encode($responseEntity));



    }

    public function testCreateComposite(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantCreateCompositeRequest.json');

        $requestEntity = new ProductVariant($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->createComposite(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantCreateCompositeResponse.json');
        self::assertInstanceOf(ProductVariant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', RelatedProductVariant::class);



    }

    public function testUpdateComposite(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVariantUpdateCompositeRequest.json');

        $requestEntity = new ProductVariant($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVariants->updateComposite(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVariantUpdateCompositeResponse.json');
        self::assertInstanceOf(ProductVariant::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', ProductVariantPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'relatedVariants', RelatedProductVariant::class);



    }

    public function testDeleteComposite(): void
    {
        $this->api->productVariants->deleteComposite(Identifier::fromId(1), Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUnlockAttributeGroup(): void
    {
        $this->api->productVariants->unlockAttributeGroup(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

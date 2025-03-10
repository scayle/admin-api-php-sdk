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

use Scayle\Cloud\AdminApi\Models\AssetSource;
use Scayle\Cloud\AdminApi\Models\Attribute;
use Scayle\Cloud\AdminApi\Models\AttributeCollection;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\ProductImage;
use Scayle\Cloud\AdminApi\Models\ProductImageCollection;
use Scayle\Cloud\AdminApi\Models\ProductImagePosition;

/**
 * @internal
 */
final class ProductImageTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductImageCreateRequest.json');

        $requestEntity = new ProductImage($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductImageCreateResponse.json');
        self::assertInstanceOf(ProductImage::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);



    }

    public function testAll(): void
    {
        $responseEntity = $this->api->productImages->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductImageAllResponse.json');
        self::assertInstanceOf(ProductImageCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductImage::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'source', AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);

        }
    }

    public function testUpdatePosition(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductImageUpdatePositionRequest.json');

        $requestEntity = new ProductImagePosition($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->updatePosition(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductImageUpdatePositionResponse.json');
        self::assertInstanceOf(ProductImage::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', AssetSource::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);



    }

    public function testDelete(): void
    {
        $this->api->productImages->delete(Identifier::fromId(1), Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateOrCreateAttribute(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductImageUpdateOrCreateAttributeRequest.json');

        $requestEntity = new Attribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->updateOrCreateAttribute(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductImageUpdateOrCreateAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteAttribute(): void
    {
        $this->api->productImages->deleteAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetAttribute(): void
    {
        $responseEntity = $this->api->productImages->getAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductImageGetAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAllAttributes(): void
    {
        $responseEntity = $this->api->productImages->allAttributes(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductImageAllAttributesResponse.json');
        self::assertInstanceOf(AttributeCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'source', AssetSource::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);

        }
    }
}

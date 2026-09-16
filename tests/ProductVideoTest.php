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
use Scayle\Cloud\AdminApi\Models\ProductVideo;
use Scayle\Cloud\AdminApi\Models\ProductVideoCollection;

/**
 * @internal
 */
final class ProductVideoTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVideoCreateRequest.json');

        $requestEntity = new ProductVideo($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVideos->create(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVideoCreateResponse.json');
        self::assertInstanceOf(ProductVideo::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);



    }

    public function testAll(): void
    {
        $responseEntity = $this->api->productVideos->all(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVideoAllResponse.json');
        self::assertInstanceOf(ProductVideoCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', Attribute::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductVideo::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);

        }
    }

    public function testDelete(): void
    {
        $this->api->productVideos->delete(Identifier::fromId(1), Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateOrCreateAttribute(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductVideoUpdateOrCreateAttributeRequest.json');

        $requestEntity = new Attribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productVideos->updateOrCreateAttribute(Identifier::fromId(1), Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductVideoUpdateOrCreateAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteAttribute(): void
    {
        $this->api->productVideos->deleteAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetAttribute(): void
    {
        $responseEntity = $this->api->productVideos->getAttribute(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('ProductVideoGetAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAllAttributes(): void
    {
        $responseEntity = $this->api->productVideos->allAttributes(Identifier::fromId(1), Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('ProductVideoAllAttributesResponse.json');
        self::assertInstanceOf(AttributeCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);

        }
    }

    public function testUnlockAttributeGroup(): void
    {
        $this->api->productVideos->unlockAttributeGroup(Identifier::fromId(1), Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

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
use Scayle\Cloud\AdminApi\Models\ProductMasterCategories;

/**
 * @internal
 */
final class MasterTest extends BaseApiTestCase
{
    public function testUpdateProductMasterMasterCategories(): void
    {
        $expectedRequestJson = $this->loadFixture('MasterUpdateProductMasterMasterCategoriesRequest.json');

        $requestEntity = new ProductMasterCategories($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masters->updateProductMasterMasterCategories(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterUpdateProductMasterMasterCategoriesResponse.json');
        self::assertInstanceOf(ProductMasterCategories::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAllAttributes(): void
    {
        $responseEntity = $this->api->masters->allAttributes(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('MasterAllAttributesResponse.json');
        self::assertInstanceOf(AttributeCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Attribute::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'categories', ProductMasterCategories::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', Attribute::class);

        }
    }

    public function testUpdateOrCreateAttribute(): void
    {
        $expectedRequestJson = $this->loadFixture('MasterUpdateOrCreateAttributeRequest.json');

        $requestEntity = new Attribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masters->updateOrCreateAttribute(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterUpdateOrCreateAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGetAttribute(): void
    {
        $responseEntity = $this->api->masters->getAttribute(Identifier::fromId(1), 'acme', []);

        $expectedResponseJson = $this->loadFixture('MasterGetAttributeResponse.json');
        self::assertInstanceOf(Attribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteAttribute(): void
    {
        $this->api->masters->deleteAttribute(Identifier::fromId(1), 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

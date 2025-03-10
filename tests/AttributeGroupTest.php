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

use Scayle\Cloud\AdminApi\Models\ArrayCollection;
use Scayle\Cloud\AdminApi\Models\AttributeGroup;
use Scayle\Cloud\AdminApi\Models\AttributeGroupAttribute;
use Scayle\Cloud\AdminApi\Models\AttributeGroupCollection;

/**
 * @internal
 */
final class AttributeGroupTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupCreateRequest.json');

        $requestEntity = new AttributeGroup($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupCreateResponse.json');
        self::assertInstanceOf(AttributeGroup::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGet(): void
    {
        $responseEntity = $this->api->attributeGroups->get('acme', []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupGetResponse.json');
        self::assertInstanceOf(AttributeGroup::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->attributeGroups->all([]);

        $expectedResponseJson = $this->loadFixture('AttributeGroupAllResponse.json');
        self::assertInstanceOf(AttributeGroupCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(AttributeGroup::class, $collectionEntity);

        }
    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupUpdateRequest.json');

        $requestEntity = new AttributeGroup($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupUpdateResponse.json');
        self::assertInstanceOf(AttributeGroup::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->attributeGroups->delete('acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testUpdateFrontendName(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupUpdateFrontendNameRequest.json');

        $requestEntity = $expectedRequestJson;

        $this->api->attributeGroups->updateFrontendName('acme', $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetAttributes(): void
    {
        $responseEntity = $this->api->attributeGroups->getAttributes('acme', []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupGetAttributesResponse.json');
        self::assertInstanceOf(ArrayCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



    }

    public function testCreateAttribute(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupCreateAttributeRequest.json');

        $requestEntity = new AttributeGroupAttribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->createAttribute('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupCreateAttributeResponse.json');
        self::assertInstanceOf(AttributeGroupAttribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateAttribute(): void
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupUpdateAttributeRequest.json');

        $requestEntity = new AttributeGroupAttribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->updateAttribute('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupUpdateAttributeResponse.json');
        self::assertInstanceOf(AttributeGroupAttribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteAttribute(): void
    {
        $this->api->attributeGroups->deleteAttribute('acme', 'acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ArrayCollection;
use AboutYou\Cloud\AdminApi\Models\AttributeGroup;
use AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute;
use AboutYou\Cloud\AdminApi\Models\AttributeGroupCollection;

/**
 * @internal
 */
final class AttributeGroupTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupCreateRequest.json');

        $requestEntity = new AttributeGroup($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupCreateResponse.json');
        self::assertInstanceOf(AttributeGroup::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testGet()
    {
        $responseEntity = $this->api->attributeGroups->get('acme', []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupGetResponse.json');
        self::assertInstanceOf(AttributeGroup::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testAll()
    {
        $responseEntity = $this->api->attributeGroups->all([]);

        $expectedResponseJson = $this->loadFixture('AttributeGroupAllResponse.json');
        self::assertInstanceOf(AttributeGroupCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(AttributeGroup::class, $collectionEntity);
        }
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupUpdateRequest.json');

        $requestEntity = new AttributeGroup($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupUpdateResponse.json');
        self::assertInstanceOf(AttributeGroup::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->attributeGroups->delete('acme', []);
    }

    public function testUpdateFrontendName()
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupUpdateFrontendNameRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->attributeGroups->updateFrontendName('acme', $requestEntity, []);
    }

    public function testGetAttributes()
    {
        $responseEntity = $this->api->attributeGroups->getAttributes('acme', []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupGetAttributesResponse.json');
        self::assertInstanceOf(ArrayCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupCreateAttributeRequest.json');

        $requestEntity = new AttributeGroupAttribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->createAttribute('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupCreateAttributeResponse.json');
        self::assertInstanceOf(AttributeGroupAttribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdateAttribute()
    {
        $expectedRequestJson = $this->loadFixture('AttributeGroupUpdateAttributeRequest.json');

        $requestEntity = new AttributeGroupAttribute($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->attributeGroups->updateAttribute('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('AttributeGroupUpdateAttributeResponse.json');
        self::assertInstanceOf(AttributeGroupAttribute::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDeleteAttribute()
    {
        $responseEntity = $this->api->attributeGroups->deleteAttribute('acme', 'acme', []);
    }
}

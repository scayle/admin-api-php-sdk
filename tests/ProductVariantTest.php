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

        $this->assertPropertyHasCorrectPolymorphicType(
        $responseEntity,
            'attributes',
            'type',
            [
                'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
                'localizedString' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttribute::class,
                'localizedStringList' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttributeList::class,
                'advanced' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttribute::class,
                'advancedList' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttributeList::class,
            ]
        );

    }

    public function testGet()
    {
        $responseEntity = $this->api->productVariants->Get(Identifier::fromId(1), Identifier::fromId(1),  []);

        $expectedResponseJson = $this->loadFixture('ProductVariantGetResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'prices', \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class);

        $this->assertPropertyHasCorrectPolymorphicType(
        $responseEntity,
            'attributes',
            'type',
            [
                'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
                'localizedString' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttribute::class,
                'localizedStringList' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttributeList::class,
                'advanced' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttribute::class,
                'advancedList' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttributeList::class,
            ]
        );

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

            $this->assertPropertyHasCorrectPolymorphicType(
            $collectionEntity,
            'attributes',
            'type',
            [
                'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
                'localizedString' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttribute::class,
                'localizedStringList' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttributeList::class,
                'advanced' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttribute::class,
                'advancedList' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttributeList::class,
            ]
            );
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

        $this->assertPropertyHasCorrectPolymorphicType(
        $responseEntity,
            'attributes',
            'type',
            [
                'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
                'localizedString' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttribute::class,
                'localizedStringList' => \AboutYou\Cloud\AdminApi\Models\LocalizedAttributeList::class,
                'advanced' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttribute::class,
                'advancedList' => \AboutYou\Cloud\AdminApi\Models\AdvancedAttributeList::class,
            ]
        );

    }

    public function testDelete()
    {
        $responseEntity = $this->api->productVariants->Delete(Identifier::fromId(1), Identifier::fromId(1),  []);

    }

}
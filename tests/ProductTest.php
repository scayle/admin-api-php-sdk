<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;

class ProductTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Product($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->Create($requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);

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
        $responseEntity = $this->api->products->Get(Identifier::fromId(1),  []);

        $expectedResponseJson = $this->loadFixture('ProductGetResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);

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
        $responseEntity = $this->api->products->All( []);

        $expectedResponseJson = $this->loadFixture('ProductAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);

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
        $expectedRequestJson = $this->loadFixture('ProductUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Product($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->products->Update(Identifier::fromId(1), $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductUpdateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Product::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'master', \AboutYou\Cloud\AdminApi\Models\Master::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variants', \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'images', \AboutYou\Cloud\AdminApi\Models\ProductImage::class);

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
        $responseEntity = $this->api->products->Delete(Identifier::fromId(1),  []);

    }

}
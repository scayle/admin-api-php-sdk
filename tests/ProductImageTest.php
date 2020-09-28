<?php

namespace AboutYou\Cloud\AdminApi;

class ProductImageTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductImageCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductImage($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->Create('1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductImageCreateResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImage::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\ProductImageSource::class);

        $this->assertPropertyHasCorrectPolymorphicType(
        $responseEntity,
            'attributes',
            'type',
            [
                'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
            ]
        );

    }

    public function testAll()
    {
        $responseEntity = $this->api->productImages->All('1',  []);

        $expectedResponseJson = $this->loadFixture('ProductImageAllResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImageCollection::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImage::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'source', \AboutYou\Cloud\AdminApi\Models\ProductImageSource::class);

            $this->assertPropertyHasCorrectPolymorphicType(
            $collectionEntity,
            'attributes',
            'type',
            [
                'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
            ]
            );
        }
    }

    public function testUpdatePosition()
    {
        $expectedRequestJson = $this->loadFixture('ProductImageUpdatePositionRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ProductImagePosition($expectedRequestJson);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productImages->UpdatePosition('1', '1', $requestEntity,  []);

        $expectedResponseJson = $this->loadFixture('ProductImageUpdatePositionResponse.json');
        $this->assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ProductImage::class, $responseEntity);
        $this->assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'source', \AboutYou\Cloud\AdminApi\Models\ProductImageSource::class);

        $this->assertPropertyHasCorrectPolymorphicType(
        $responseEntity,
            'attributes',
            'type',
            [
                'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
            ]
        );

    }

    public function testDelete()
    {
        $responseEntity = $this->api->productImages->Delete('1', '1',  []);

    }

}
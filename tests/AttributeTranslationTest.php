<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class AttributeTranslationTest extends BaseApiTestCase
{
    public function testUpdateOrCreate()
    {
        $expectedRequestJson = $this->loadFixture('AttributeTranslationUpdateOrCreateRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->attributeTranslations->updateOrCreate('acme', $requestEntity, []);
    }

    public function testAll()
    {
        $responseEntity = $this->api->attributeTranslations->all('acme', []);

        $expectedResponseJson = $this->loadFixture('AttributeTranslationAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ArrayCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

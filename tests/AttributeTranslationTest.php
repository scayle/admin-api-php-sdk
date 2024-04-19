<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ArrayCollection;

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
        self::assertInstanceOf(ArrayCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }
}

<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class ShopCountryPriceRoundingTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->shopCountryPriceRoundings->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryPriceRoundingAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRoundingCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRounding::class, $collectionEntity);
        }
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryPriceRoundingCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRounding($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryPriceRoundings->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryPriceRoundingCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRounding::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCountryPriceRoundings->delete('acme', 'acme', 1, []);
    }
}

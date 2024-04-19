<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRounding;
use AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRoundingCollection;

/**
 * @internal
 */
final class ShopCountryPriceRoundingTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->shopCountryPriceRoundings->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryPriceRoundingAllResponse.json');
        self::assertInstanceOf(ShopCountryPriceRoundingCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCountryPriceRounding::class, $collectionEntity);
        }
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryPriceRoundingCreateRequest.json');

        $requestEntity = new ShopCountryPriceRounding($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryPriceRoundings->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryPriceRoundingCreateResponse.json');
        self::assertInstanceOf(ShopCountryPriceRounding::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDelete()
    {
        $responseEntity = $this->api->shopCountryPriceRoundings->delete('acme', 'acme', 1, []);
    }
}

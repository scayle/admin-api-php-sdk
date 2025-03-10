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

use Scayle\Cloud\AdminApi\Models\ShopCountryPriceRounding;
use Scayle\Cloud\AdminApi\Models\ShopCountryPriceRoundingCollection;

/**
 * @internal
 */
final class ShopCountryPriceRoundingTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->shopCountryPriceRoundings->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCountryPriceRoundingAllResponse.json');
        self::assertInstanceOf(ShopCountryPriceRoundingCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCountryPriceRounding::class, $collectionEntity);

        }
    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryPriceRoundingCreateRequest.json');

        $requestEntity = new ShopCountryPriceRounding($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryPriceRoundings->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryPriceRoundingCreateResponse.json');
        self::assertInstanceOf(ShopCountryPriceRounding::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->shopCountryPriceRoundings->delete('acme', 'acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

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

use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Merchant;
use Scayle\Cloud\AdminApi\Models\Warehouse;
use Scayle\Cloud\AdminApi\Models\WarehouseCollection;
use Scayle\Cloud\AdminApi\Models\WarehouseShopCountry;

/**
 * @internal
 */
final class WarehouseTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->warehouses->all([]);

        $expectedResponseJson = $this->loadFixture('WarehouseAllResponse.json');
        self::assertInstanceOf(WarehouseCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchants', Merchant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountries', WarehouseShopCountry::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Warehouse::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'merchants', Merchant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'shopCountries', WarehouseShopCountry::class);

        }
    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('WarehouseCreateRequest.json');

        $requestEntity = new Warehouse($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->warehouses->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('WarehouseCreateResponse.json');
        self::assertInstanceOf(Warehouse::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchants', Merchant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountries', WarehouseShopCountry::class);



    }

    public function testDelete(): void
    {
        $this->api->warehouses->delete(Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

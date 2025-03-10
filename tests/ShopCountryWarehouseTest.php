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
use Scayle\Cloud\AdminApi\Models\PackageGroup;
use Scayle\Cloud\AdminApi\Models\ShopCountryWarehouse;

/**
 * @internal
 */
final class ShopCountryWarehouseTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryWarehouseCreateRequest.json');

        $requestEntity = new ShopCountryWarehouse($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryWarehouses->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryWarehouseCreateResponse.json');
        self::assertInstanceOf(ShopCountryWarehouse::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', PackageGroup::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCountryWarehouseUpdateRequest.json');

        $requestEntity = new ShopCountryWarehouse($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCountryWarehouses->update('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCountryWarehouseUpdateResponse.json');
        self::assertInstanceOf(ShopCountryWarehouse::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'packageGroup', PackageGroup::class);



    }

    public function testDelete(): void
    {
        $this->api->shopCountryWarehouses->delete('acme', 'acme', Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

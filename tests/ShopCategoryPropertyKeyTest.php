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

use Scayle\Cloud\AdminApi\Models\ShopCategoryPropertyKey;
use Scayle\Cloud\AdminApi\Models\ShopCategoryPropertyKeyCollection;

/**
 * @internal
 */
final class ShopCategoryPropertyKeyTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryPropertyKeyCreateRequest.json');

        $requestEntity = new ShopCategoryPropertyKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryPropertyKeys->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyCreateResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testGet(): void
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->get('acme', []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyGetResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->shopCategoryPropertyKeys->all([]);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyAllResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKeyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ShopCategoryPropertyKey::class, $collectionEntity);

        }
    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('ShopCategoryPropertyKeyUpdateRequest.json');

        $requestEntity = new ShopCategoryPropertyKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->shopCategoryPropertyKeys->update('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ShopCategoryPropertyKeyUpdateResponse.json');
        self::assertInstanceOf(ShopCategoryPropertyKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->shopCategoryPropertyKeys->delete('acme', []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

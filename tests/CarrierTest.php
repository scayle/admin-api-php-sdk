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

use Scayle\Cloud\AdminApi\Models\Carrier;
use Scayle\Cloud\AdminApi\Models\CarrierCollection;
use Scayle\Cloud\AdminApi\Models\Identifier;

/**
 * @internal
 */
final class CarrierTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->carriers->all([]);

        $expectedResponseJson = $this->loadFixture('CarrierAllResponse.json');
        self::assertInstanceOf(CarrierCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Carrier::class, $collectionEntity);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->carriers->get(Identifier::fromId(1), []);

        $expectedResponseJson = $this->loadFixture('CarrierGetResponse.json');
        self::assertInstanceOf(Carrier::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('CarrierCreateRequest.json');

        $requestEntity = new Carrier($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->carriers->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CarrierCreateResponse.json');
        self::assertInstanceOf(Carrier::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('CarrierUpdateRequest.json');

        $requestEntity = new Carrier($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->carriers->update(Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CarrierUpdateResponse.json');
        self::assertInstanceOf(Carrier::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }
}

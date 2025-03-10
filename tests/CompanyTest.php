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

use Scayle\Cloud\AdminApi\Models\Company;
use Scayle\Cloud\AdminApi\Models\CompanyCollection;

/**
 * @internal
 */
final class CompanyTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('CompanyCreateRequest.json');

        $requestEntity = new Company($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->companies->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CompanyCreateResponse.json');
        self::assertInstanceOf(Company::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->companies->all([]);

        $expectedResponseJson = $this->loadFixture('CompanyAllResponse.json');
        self::assertInstanceOf(CompanyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Company::class, $collectionEntity);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->companies->get(1, []);

        $expectedResponseJson = $this->loadFixture('CompanyGetResponse.json');
        self::assertInstanceOf(Company::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('CompanyUpdateRequest.json');

        $requestEntity = new Company($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->companies->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('CompanyUpdateResponse.json');
        self::assertInstanceOf(Company::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }
}

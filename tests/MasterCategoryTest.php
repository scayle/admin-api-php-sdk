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

use Scayle\Cloud\AdminApi\Models\MasterCategory;
use Scayle\Cloud\AdminApi\Models\MasterCategoryAttribute;
use Scayle\Cloud\AdminApi\Models\MasterCategoryCollection;

/**
 * @internal
 */
final class MasterCategoryTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->masterCategories->all([]);

        $expectedResponseJson = $this->loadFixture('MasterCategoryAllResponse.json');
        self::assertInstanceOf(MasterCategoryCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(MasterCategory::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'attributes', MasterCategoryAttribute::class);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->masterCategories->get(1, []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryGetResponse.json');
        self::assertInstanceOf(MasterCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);



    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('MasterCategoryCreateRequest.json');

        $requestEntity = new MasterCategory($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masterCategories->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryCreateResponse.json');
        self::assertInstanceOf(MasterCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('MasterCategoryUpdateRequest.json');

        $requestEntity = new MasterCategory($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->masterCategories->update(1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('MasterCategoryUpdateResponse.json');
        self::assertInstanceOf(MasterCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'attributes', MasterCategoryAttribute::class);



    }

    public function testDelete(): void
    {
        $this->api->masterCategories->delete(1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

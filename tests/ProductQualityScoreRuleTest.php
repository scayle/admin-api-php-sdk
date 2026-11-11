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

use Scayle\Cloud\AdminApi\Models\ProductQualityScoreCategory;
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreRule;
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreRuleCollection;
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreRuleEntry;
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreRuleUpdateOrCreateRequest;

/**
 * @internal
 */
final class ProductQualityScoreRuleTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->productQualityScoreRules->all([]);

        $expectedResponseJson = $this->loadFixture('ProductQualityScoreRuleAllResponse.json');
        self::assertInstanceOf(ProductQualityScoreRuleCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'rules', ProductQualityScoreRuleEntry::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(ProductQualityScoreRule::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'rules', ProductQualityScoreRuleEntry::class);

        }
    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductQualityScoreRuleCreateRequest.json');

        $requestEntity = new ProductQualityScoreRuleUpdateOrCreateRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productQualityScoreRules->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductQualityScoreRuleCreateResponse.json');
        self::assertInstanceOf(ProductQualityScoreRule::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'rules', ProductQualityScoreRuleEntry::class);



    }

    public function testGet(): void
    {
        $responseEntity = $this->api->productQualityScoreRules->get(2, []);

        $expectedResponseJson = $this->loadFixture('ProductQualityScoreRuleGetResponse.json');
        self::assertInstanceOf(ProductQualityScoreRule::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'rules', ProductQualityScoreRuleEntry::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductQualityScoreRuleUpdateRequest.json');

        $requestEntity = new ProductQualityScoreRuleUpdateOrCreateRequest($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productQualityScoreRules->update(2, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ProductQualityScoreRuleUpdateResponse.json');
        self::assertInstanceOf(ProductQualityScoreRule::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'rules', ProductQualityScoreRuleEntry::class);



    }

    public function testDelete(): void
    {
        $this->api->productQualityScoreRules->delete(2, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testAttach(): void
    {
        $responseEntity = $this->api->productQualityScoreRules->attach(2, 4, []);

        $expectedResponseJson = $this->loadFixture('ProductQualityScoreRuleAttachResponse.json');
        self::assertInstanceOf(ProductQualityScoreRule::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'rules', ProductQualityScoreRuleEntry::class);



    }

    public function testDetach(): void
    {
        $this->api->productQualityScoreRules->detach(2, 4, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCategory(): void
    {
        $responseEntity = $this->api->productQualityScoreRules->getCategory(4, []);

        $expectedResponseJson = $this->loadFixture('ProductQualityScoreRuleGetCategoryResponse.json');
        self::assertInstanceOf(ProductQualityScoreCategory::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'rules', ProductQualityScoreRuleEntry::class);



    }
}

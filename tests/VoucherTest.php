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

use Scayle\Cloud\AdminApi\Models\Voucher;
use Scayle\Cloud\AdminApi\Models\VoucherCollection;
use Scayle\Cloud\AdminApi\Models\VoucherConstraints;
use Scayle\Cloud\AdminApi\Models\VoucherCriterion;
use Scayle\Cloud\AdminApi\Models\VoucherCriterionCollection;

/**
 * @internal
 */
final class VoucherTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->vouchers->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('VoucherAllResponse.json');
        self::assertInstanceOf(VoucherCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', VoucherCriterion::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Voucher::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'constraints', VoucherConstraints::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'criteria', VoucherCriterion::class);

        }
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->vouchers->get('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetResponse.json');
        self::assertInstanceOf(Voucher::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', VoucherCriterion::class);



    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('VoucherCreateRequest.json');

        $requestEntity = new Voucher($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherCreateResponse.json');
        self::assertInstanceOf(Voucher::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', VoucherCriterion::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('VoucherUpdateRequest.json');

        $requestEntity = new Voucher($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->update('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherUpdateResponse.json');
        self::assertInstanceOf(Voucher::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', VoucherCriterion::class);



    }

    public function testDelete(): void
    {
        $this->api->vouchers->delete('acme', 'acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGetCriteria(): void
    {
        $responseEntity = $this->api->vouchers->getCriteria('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetCriteriaResponse.json');
        self::assertInstanceOf(VoucherCriterionCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(VoucherCriterion::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'constraints', VoucherConstraints::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'criteria', VoucherCriterion::class);

        }
    }

    public function testGetCriterion(): void
    {
        $responseEntity = $this->api->vouchers->getCriterion('acme', 'acme', 1, 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetCriterionResponse.json');
        self::assertInstanceOf(VoucherCriterion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testCreateCriterion(): void
    {
        $expectedRequestJson = $this->loadFixture('VoucherCreateCriterionRequest.json');

        $requestEntity = new VoucherCriterion($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->createCriterion('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherCreateCriterionResponse.json');
        self::assertInstanceOf(VoucherCriterion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdateCriterion(): void
    {
        $expectedRequestJson = $this->loadFixture('VoucherUpdateCriterionRequest.json');

        $requestEntity = new VoucherCriterion($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->updateCriterion('acme', 'acme', 1, 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherUpdateCriterionResponse.json');
        self::assertInstanceOf(VoucherCriterion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDeleteCriterion(): void
    {
        $this->api->vouchers->deleteCriterion('acme', 'acme', 1, 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}

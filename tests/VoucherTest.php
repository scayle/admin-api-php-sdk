<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Voucher;
use AboutYou\Cloud\AdminApi\Models\VoucherCollection;
use AboutYou\Cloud\AdminApi\Models\VoucherConstraints;
use AboutYou\Cloud\AdminApi\Models\VoucherCriterion;
use AboutYou\Cloud\AdminApi\Models\VoucherCriterionCollection;

/**
 * @internal
 */
final class VoucherTest extends BaseApiTestCase
{
    public function testAll()
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

    public function testGet()
    {
        $responseEntity = $this->api->vouchers->get('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetResponse.json');
        self::assertInstanceOf(Voucher::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', VoucherCriterion::class);
    }

    public function testCreate()
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

    public function testUpdate()
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

    public function testDelete()
    {
        $responseEntity = $this->api->vouchers->delete('acme', 'acme', 1, []);
    }

    public function testGetCriteria()
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

    public function testGetCriterion()
    {
        $responseEntity = $this->api->vouchers->getCriterion('acme', 'acme', 1, 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetCriterionResponse.json');
        self::assertInstanceOf(VoucherCriterion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testCreateCriterion()
    {
        $expectedRequestJson = $this->loadFixture('VoucherCreateCriterionRequest.json');

        $requestEntity = new VoucherCriterion($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->createCriterion('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherCreateCriterionResponse.json');
        self::assertInstanceOf(VoucherCriterion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testUpdateCriterion()
    {
        $expectedRequestJson = $this->loadFixture('VoucherUpdateCriterionRequest.json');

        $requestEntity = new VoucherCriterion($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->updateCriterion('acme', 'acme', 1, 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherUpdateCriterionResponse.json');
        self::assertInstanceOf(VoucherCriterion::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());
    }

    public function testDeleteCriterion()
    {
        $responseEntity = $this->api->vouchers->deleteCriterion('acme', 'acme', 1, 1, []);
    }
}

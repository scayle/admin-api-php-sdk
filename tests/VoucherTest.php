<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class VoucherTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->vouchers->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('VoucherAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\VoucherCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->vouchers->get('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('VoucherCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Voucher($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('VoucherUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Voucher($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->update('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->vouchers->delete('acme', 'acme', 1, []);
    }

    public function testGetCriteria()
    {
        $responseEntity = $this->api->vouchers->getCriteria('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetCriteriaResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\VoucherCriterionCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
        }
    }

    public function testGetCriterion()
    {
        $responseEntity = $this->api->vouchers->getCriterion('acme', 'acme', 1, 1, []);

        $expectedResponseJson = $this->loadFixture('VoucherGetCriterionResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
    }

    public function testCreateCriterion()
    {
        $expectedRequestJson = $this->loadFixture('VoucherCreateCriterionRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\VoucherCriterion($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->createCriterion('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherCreateCriterionResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
    }

    public function testUpdateCriterion()
    {
        $expectedRequestJson = $this->loadFixture('VoucherUpdateCriterionRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\VoucherCriterion($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->updateCriterion('acme', 'acme', 1, 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherUpdateCriterionResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'criteria', \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class);
    }

    public function testDeleteCriterion()
    {
        $responseEntity = $this->api->vouchers->deleteCriterion('acme', 'acme', 1, 1, []);
    }
}

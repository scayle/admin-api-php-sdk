<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class VoucherTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->vouchers->All('1', '1', []);

        $expectedResponseJson = $this->loadFixture('VoucherAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\VoucherCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
        }
    }

    public function testGet()
    {
        $responseEntity = $this->api->vouchers->Get('1', '1', '1', []);

        $expectedResponseJson = $this->loadFixture('VoucherGetResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
    }

    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('VoucherCreateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Voucher($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->Create('1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherCreateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
    }

    public function testUpdate()
    {
        $expectedRequestJson = $this->loadFixture('VoucherUpdateRequest.json');

        $requestEntity = new \AboutYou\Cloud\AdminApi\Models\Voucher($expectedRequestJson);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->vouchers->Update('1', '1', '1', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('VoucherUpdateResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\Voucher::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(\json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'constraints', \AboutYou\Cloud\AdminApi\Models\VoucherConstraints::class);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->vouchers->Delete('1', '1', '1', []);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Voucher;
use AboutYou\Cloud\AdminApi\Models\VoucherCollection;
use AboutYou\Cloud\AdminApi\Models\VoucherCriterion;
use AboutYou\Cloud\AdminApi\Models\VoucherCriterionCollection;
use Psr\Http\Client\ClientExceptionInterface;

class VoucherService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return VoucherCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode),
            $options,
            [],
            VoucherCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param array $options additional options like limit or filters
     *
     * @return Voucher
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopKey, $countryCode, $voucherId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            Voucher::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Voucher $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Voucher
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode),
            $options,
            [],
            Voucher::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param Voucher $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Voucher
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $countryCode, $voucherId, $model, $options = [])
    {
        return $this->request(
            'patch',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            Voucher::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $countryCode, $voucherId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param array $options additional options like limit or filters
     *
     * @return VoucherCriterionCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCriteria($shopKey, $countryCode, $voucherId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            VoucherCriterionCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param int $voucherCriterionId
     * @param array $options additional options like limit or filters
     *
     * @return VoucherCriterion
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCriterion($shopKey, $countryCode, $voucherId, $voucherCriterionId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            $options,
            [],
            VoucherCriterion::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param VoucherCriterion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return VoucherCriterion
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createCriterion($shopKey, $countryCode, $voucherId, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            VoucherCriterion::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param int $voucherCriterionId
     * @param VoucherCriterion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return VoucherCriterion
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateCriterion($shopKey, $countryCode, $voucherId, $voucherCriterionId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            $options,
            [],
            VoucherCriterion::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param int $voucherCriterionId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCriterion($shopKey, $countryCode, $voucherId, $voucherCriterionId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            $options,
            [],
            null,
            null
        );
    }
}

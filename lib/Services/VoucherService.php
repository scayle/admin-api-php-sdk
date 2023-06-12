<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class VoucherService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\VoucherCollection
     */
    public function all($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\VoucherCollection::class,
            null
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
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Voucher
     */
    public function get($shopKey, $countryCode, $voucherId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Voucher::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Voucher $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Voucher
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Voucher::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param \AboutYou\Cloud\AdminApi\Models\Voucher $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Voucher
     */
    public function update($shopKey, $countryCode, $voucherId, $model, $options = [])
    {
        return $this->request(
            'patch',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Voucher::class,
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
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\VoucherCriterionCollection
     */
    public function getCriteria($shopKey, $countryCode, $voucherId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\VoucherCriterionCollection::class,
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
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\VoucherCriterion
     */
    public function getCriterion($shopKey, $countryCode, $voucherId, $voucherCriterionId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param \AboutYou\Cloud\AdminApi\Models\VoucherCriterion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\VoucherCriterion
     */
    public function createCriterion($shopKey, $countryCode, $voucherId, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria', $shopKey, $countryCode, $voucherId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $voucherId
     * @param int $voucherCriterionId
     * @param \AboutYou\Cloud\AdminApi\Models\VoucherCriterion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\VoucherCriterion
     */
    public function updateCriterion($shopKey, $countryCode, $voucherId, $voucherCriterionId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\VoucherCriterion::class,
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

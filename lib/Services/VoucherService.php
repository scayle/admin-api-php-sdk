<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class VoucherService extends AbstractService
{
    /**
     * Description.
     *
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
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\VoucherCollection::class);
    }

    /**
     * Description.
     *
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
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId), $options, \AboutYou\Cloud\AdminApi\Models\Voucher::class);
    }

    /**
     * Description.
     *
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
        return $this->request('post', $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\Voucher::class, $model);
    }

    /**
     * Description.
     *
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
        return $this->request('put', $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId), $options, \AboutYou\Cloud\AdminApi\Models\Voucher::class, $model);
    }

    /**
     * Description.
     *
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
        $this->request('delete', $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId), $options, null);
    }
}

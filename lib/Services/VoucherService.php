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

namespace Scayle\Cloud\AdminApi\Services;

use Psr\Http\Client\ClientExceptionInterface;
use Scayle\Cloud\AdminApi\Exceptions\ApiErrorException;
use Scayle\Cloud\AdminApi\Models\Voucher;
use Scayle\Cloud\AdminApi\Models\VoucherCollection;
use Scayle\Cloud\AdminApi\Models\VoucherCriterion;
use Scayle\Cloud\AdminApi\Models\VoucherCriterionCollection;

class VoucherService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        string $shopKey,
        string $countryCode,
        array $options = []
    ): VoucherCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: VoucherCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        array $options = []
    ): Voucher {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            query: $options,
            headers: [],
            modelClass: Voucher::class,
            body: null
        );
    }

    /**
     * @param Voucher $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        string $countryCode,
        Voucher $model,
        array $options = []
    ): Voucher {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: Voucher::class,
            body: $model
        );
    }

    /**
     * @param Voucher $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        Voucher $model,
        array $options = []
    ): Voucher {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            query: $options,
            headers: [],
            modelClass: Voucher::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s', $shopKey, $countryCode, $voucherId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCriteria(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        array $options = []
    ): VoucherCriterionCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria', $shopKey, $countryCode, $voucherId),
            query: $options,
            headers: [],
            modelClass: VoucherCriterionCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCriterion(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        int $voucherCriterionId,
        array $options = []
    ): VoucherCriterion {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            query: $options,
            headers: [],
            modelClass: VoucherCriterion::class,
            body: null
        );
    }

    /**
     * @param VoucherCriterion $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createCriterion(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        VoucherCriterion $model,
        array $options = []
    ): VoucherCriterion {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria', $shopKey, $countryCode, $voucherId),
            query: $options,
            headers: [],
            modelClass: VoucherCriterion::class,
            body: $model
        );
    }

    /**
     * @param VoucherCriterion $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateCriterion(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        int $voucherCriterionId,
        VoucherCriterion $model,
        array $options = []
    ): VoucherCriterion {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            query: $options,
            headers: [],
            modelClass: VoucherCriterion::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCriterion(
        string $shopKey,
        string $countryCode,
        int $voucherId,
        int $voucherCriterionId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/vouchers/%s/criteria/%s', $shopKey, $countryCode, $voucherId, $voucherCriterionId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

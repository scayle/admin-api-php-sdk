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
use Scayle\Cloud\AdminApi\Models\PackageGroupCollection;
use Scayle\Cloud\AdminApi\Models\PackageGroupWarehouse;

class PackageGroupService extends AbstractService
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
    ): PackageGroupCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/package-groups', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: PackageGroupCollection::class,
            body: null
        );
    }

    /**
     * @param PackageGroupWarehouse[] $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function assignPackageGroupToWarehouses(
        string $shopKey,
        string $countryCode,
        int $packageGroupId,
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/package-groups/%s', $shopKey, $countryCode, $packageGroupId),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }

    /**
     * @param PackageGroupWarehouse[] $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function replacePackageGroupForWarehouses(
        string $shopKey,
        string $countryCode,
        int $packageGroupId,
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/package-groups/%s', $shopKey, $countryCode, $packageGroupId),
            query: $options,
            headers: [],
            modelClass: null,
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
        int $packageGroupId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/package-groups/%s', $shopKey, $countryCode, $packageGroupId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

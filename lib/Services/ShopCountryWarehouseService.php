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
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\ShopCountryWarehouse;

class ShopCountryWarehouseService extends AbstractService
{
    /**
     * @param ShopCountryWarehouse $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        string $countryCode,
        ShopCountryWarehouse $model,
        array $options = []
    ): ShopCountryWarehouse {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/warehouses', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: ShopCountryWarehouse::class,
            body: $model
        );
    }

    /**
     * @param ShopCountryWarehouse $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        string $countryCode,
        Identifier $warehouseIdentifier,
        ShopCountryWarehouse $model,
        array $options = []
    ): ShopCountryWarehouse {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/warehouses/%s', $shopKey, $countryCode, $warehouseIdentifier),
            query: $options,
            headers: [],
            modelClass: ShopCountryWarehouse::class,
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
        Identifier $warehouseIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/warehouses/%s', $shopKey, $countryCode, $warehouseIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

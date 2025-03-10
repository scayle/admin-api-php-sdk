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
use Scayle\Cloud\AdminApi\Models\Warehouse;
use Scayle\Cloud\AdminApi\Models\WarehouseCollection;

class WarehouseService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): WarehouseCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/warehouses'),
            query: $options,
            headers: [],
            modelClass: WarehouseCollection::class,
            body: null
        );
    }

    /**
     * @param Warehouse $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Warehouse $model,
        array $options = []
    ): Warehouse {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/warehouses'),
            query: $options,
            headers: [],
            modelClass: Warehouse::class,
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
        Identifier $warehouseIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/warehouses/%s', $warehouseIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

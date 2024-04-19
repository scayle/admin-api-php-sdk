<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Warehouse;
use AboutYou\Cloud\AdminApi\Models\WarehouseCollection;
use Psr\Http\Client\ClientExceptionInterface;

class WarehouseService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return WarehouseCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/warehouses'),
            $options,
            [],
            WarehouseCollection::class,
            null
        );
    }

    /**
     * @param Warehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Warehouse
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/warehouses'),
            $options,
            [],
            Warehouse::class,
            $model
        );
    }

    /**
     * @param Identifier $warehouseIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($warehouseIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/warehouses/%s', $warehouseIdentifier),
            $options,
            [],
            null,
            null
        );
    }
}

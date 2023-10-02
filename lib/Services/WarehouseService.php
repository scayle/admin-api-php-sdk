<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class WarehouseService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\WarehouseCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/warehouses'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\WarehouseCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Warehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Warehouse
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/warehouses'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Warehouse::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $warehouseIdentifier
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

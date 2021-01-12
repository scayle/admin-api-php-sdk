<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ShopWarehouseService extends AbstractService
{
    /**
     * Description.
     *
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\ShopWarehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopWarehouse
     */
    public function create($shopKey, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/warehouses', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $shopWarehouseIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\ShopWarehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopWarehouse
     */
    public function update($shopKey, $shopWarehouseIdentifier, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/warehouses/%s', $shopKey, $shopWarehouseIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $shopWarehouseIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $shopWarehouseIdentifier, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/warehouses/%s', $shopKey, $shopWarehouseIdentifier), $options, null);
    }
}

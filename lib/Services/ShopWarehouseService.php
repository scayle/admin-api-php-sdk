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
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\ShopWarehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopWarehouse
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/warehouses', $shopKey, $countryCode),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class,
            $model
        );
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $shopWarehouseIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\ShopWarehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopWarehouse
     */
    public function update($shopKey, $countryCode, $shopWarehouseIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/warehouses/%s', $shopKey, $countryCode, $shopWarehouseIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ShopWarehouse::class,
            $model
        );
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $shopWarehouseIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $countryCode, $shopWarehouseIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/warehouses/%s', $shopKey, $countryCode, $shopWarehouseIdentifier),
            $options,
            [],
            null,
            null
        );
    }
}

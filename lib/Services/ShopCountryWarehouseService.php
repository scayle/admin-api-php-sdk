<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ShopCountryWarehouse;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCountryWarehouseService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param ShopCountryWarehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountryWarehouse
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/warehouses', $shopKey, $countryCode),
            $options,
            [],
            ShopCountryWarehouse::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $warehouseIdentifier
     * @param ShopCountryWarehouse $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountryWarehouse
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $countryCode, $warehouseIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/warehouses/%s', $shopKey, $countryCode, $warehouseIdentifier),
            $options,
            [],
            ShopCountryWarehouse::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $warehouseIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $countryCode, $warehouseIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/warehouses/%s', $shopKey, $countryCode, $warehouseIdentifier),
            $options,
            [],
            null,
            null
        );
    }
}

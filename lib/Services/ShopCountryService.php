<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Assortment;
use AboutYou\Cloud\AdminApi\Models\ShopCountry;
use AboutYou\Cloud\AdminApi\Models\ShopCountryCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCountryService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param ShopCountry $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountry
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries', $shopKey),
            $options,
            [],
            ShopCountry::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountryCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries', $shopKey),
            $options,
            [],
            ShopCountryCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountry
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s', $shopKey, $countryCode),
            $options,
            [],
            ShopCountry::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param ShopCountry $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountry
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s', $shopKey, $countryCode),
            $options,
            [],
            ShopCountry::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Assortment $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Assortment
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAssortment($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/assortment', $shopKey, $countryCode),
            $options,
            [],
            Assortment::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomData($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/custom-data', $shopKey, $countryCode),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($shopKey, $countryCode, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/custom-data', $shopKey, $countryCode),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomData($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/custom-data', $shopKey, $countryCode),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomDataForKey($shopKey, $countryCode, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/custom-data/%s', $shopKey, $countryCode, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($shopKey, $countryCode, $key, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/custom-data/%s', $shopKey, $countryCode, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataForKey($shopKey, $countryCode, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/custom-data/%s', $shopKey, $countryCode, $key),
            $options,
            [],
            null,
            null
        );
    }
}

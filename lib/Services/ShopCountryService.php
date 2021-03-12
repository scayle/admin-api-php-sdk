<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCountryService extends AbstractService
{
    /**
     * Description.
     *
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCountry $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCountry
     */
    public function create($shopKey, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/countries', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCountryCollection
     */
    public function all($shopKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCountryCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCountry
     */
    public function get($shopKey, $countryCode, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\ShopCountry::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCountry $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCountry
     */
    public function update($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/countries/%s', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\ShopCountry::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Assortment $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Assortment
     */
    public function updateAssortment($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/countries/%s/assortment', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\Assortment::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\ShopProperty $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopProperty
     */
    public function updateOrCreateProperty($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/countries/%s/properties', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param string $shopPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteProperty($shopKey, $countryCode, $shopPropertyKey, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/countries/%s/properties/%s', $shopKey, $countryCode, $shopPropertyKey), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param string $shopPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopProperty
     */
    public function getProperty($shopKey, $countryCode, $shopPropertyKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/properties/%s', $shopKey, $countryCode, $shopPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopPropertyCollection
     */
    public function allProperties($shopKey, $countryCode, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/properties', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\ShopPropertyCollection::class);
    }
}

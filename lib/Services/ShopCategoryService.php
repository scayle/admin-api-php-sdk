<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCategoryService extends AbstractService
{
    /**
     * Description.
     *
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCategory $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategory
     */
    public function create($shopKey, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/categories', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $model);
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
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryCollection
     */
    public function all($shopKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategory
     */
    public function get($shopKey, $shopCategoryId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategory::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCategory $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategory
     */
    public function update($shopKey, $shopCategoryId, $model, $options = [])
    {
        return $this->request('patch', $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategory::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $shopCategoryId, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty
     */
    public function updateOrCreateProperty($shopKey, $countryCode, $shopCategoryId, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties', $shopKey, $countryCode, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteProperty($shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties/%s', $shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty
     */
    public function getProperty($shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties/%s', $shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection
     */
    public function allProperties($shopKey, $countryCode, $shopCategoryId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties', $shopKey, $countryCode, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomData($shopKey, $shopCategoryId, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($shopKey, $shopCategoryId, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomData($shopKey, $shopCategoryId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomDataForKey($shopKey, $shopCategoryId, $key, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($shopKey, $shopCategoryId, $key, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomDataForKey($shopKey, $shopCategoryId, $key, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomDataForCountry($shopKey, $shopCategoryId, $countryCode, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForCountry($shopKey, $shopCategoryId, $countryCode, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomDataForCountry($shopKey, $shopCategoryId, $countryCode, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomDataKeyForCountry($shopKey, $shopCategoryId, $countryCode, $key, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataKeyForCountry($shopKey, $shopCategoryId, $countryCode, $key, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomDataKeyForCountry($shopKey, $shopCategoryId, $countryCode, $key, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry
     */
    public function getCountry($shopKey, $countryCode, $shopCategoryId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/categories/%s', $shopKey, $countryCode, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry
     */
    public function updateOrCreateCountry($shopKey, $countryCode, $shopCategoryId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/categories/%s', $shopKey, $countryCode, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry::class);
    }
}

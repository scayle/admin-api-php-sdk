<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ShopCategory;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryCollection;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryCountry;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCategoryService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param ShopCategory $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategory
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/categories', $shopKey),
            $options,
            [],
            ShopCategory::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/categories', $shopKey),
            $options,
            [],
            ShopCategoryCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategory
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopKey, $shopCategoryId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId),
            $options,
            [],
            ShopCategory::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param ShopCategory $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategory
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $shopCategoryId, $model, $options = [])
    {
        return $this->request(
            'patch',
            $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId),
            $options,
            [],
            ShopCategory::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $shopCategoryId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param ShopCategoryProperty $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryProperty
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateProperty($shopKey, $countryCode, $shopCategoryId, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties', $shopKey, $countryCode, $shopCategoryId),
            $options,
            [],
            ShopCategoryProperty::class,
            $model
        );
    }

    /**
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
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties/%s', $shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryProperty
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getProperty($shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties/%s', $shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey),
            $options,
            [],
            ShopCategoryProperty::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryPropertyCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allProperties($shopKey, $countryCode, $shopCategoryId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties', $shopKey, $countryCode, $shopCategoryId),
            $options,
            [],
            ShopCategoryPropertyCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomData($shopKey, $shopCategoryId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($shopKey, $shopCategoryId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomData($shopKey, $shopCategoryId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomDataForKey($shopKey, $shopCategoryId, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
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
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataForKey($shopKey, $shopCategoryId, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomDataForCountry($shopKey, $shopCategoryId, $countryCode, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode),
            $options,
            [],
            null,
            $model
        );
    }

    /**
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
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataForCountry($shopKey, $shopCategoryId, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
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
    public function createOrUpdateCustomDataKeyForCountry($shopKey, $shopCategoryId, $countryCode, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
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
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $countryCode
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataKeyForCountry($shopKey, $shopCategoryId, $countryCode, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryCountry
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCountry($shopKey, $countryCode, $shopCategoryId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/categories/%s', $shopKey, $countryCode, $shopCategoryId),
            $options,
            [],
            ShopCategoryCountry::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $shopCategoryId
     * @param ShopCategoryCountry $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryCountry
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateCountry($shopKey, $countryCode, $shopCategoryId, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/categories/%s', $shopKey, $countryCode, $shopCategoryId),
            $options,
            [],
            ShopCategoryCountry::class,
            $model
        );
    }
}

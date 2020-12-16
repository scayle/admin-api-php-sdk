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
     * @param int $shopCategoryId
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty
     */
    public function updateOrCreateProperty($shopKey, $shopCategoryId, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/categories/%s/properties', $shopKey, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteProperty($shopKey, $shopCategoryId, $shopCategoryPropertyKey, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/categories/%s/properties/%s', $shopKey, $shopCategoryId, $shopCategoryPropertyKey), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $shopCategoryId
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty
     */
    public function getProperty($shopKey, $shopCategoryId, $shopCategoryPropertyKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories/%s/properties/%s', $shopKey, $shopCategoryId, $shopCategoryPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryProperty::class);
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
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection
     */
    public function allProperties($shopKey, $shopCategoryId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/categories/%s/properties', $shopKey, $shopCategoryId), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyCollection::class);
    }
}

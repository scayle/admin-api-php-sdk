<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCategoryPropertyKeyService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey
     */
    public function create($model, $options = [])
    {
        return $this->request('post', '/shop-category-property-keys', $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey
     */
    public function get($shopCategoryPropertyKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey::class);
    }

    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKeyCollection
     */
    public function all($options = [])
    {
        return $this->request('get', '/shop-category-property-keys', $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKeyCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopCategoryPropertyKey
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey
     */
    public function update($shopCategoryPropertyKey, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopCategoryPropertyKey, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey), $options, null);
    }
}

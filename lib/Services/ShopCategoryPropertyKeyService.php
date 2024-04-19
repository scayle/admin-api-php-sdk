<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKey;
use AboutYou\Cloud\AdminApi\Models\ShopCategoryPropertyKeyCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCategoryPropertyKeyService extends AbstractService
{
    /**
     * @param ShopCategoryPropertyKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryPropertyKey
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shop-category-property-keys'),
            $options,
            [],
            ShopCategoryPropertyKey::class,
            $model
        );
    }

    /**
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryPropertyKey
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopCategoryPropertyKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey),
            $options,
            [],
            ShopCategoryPropertyKey::class,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryPropertyKeyCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shop-category-property-keys'),
            $options,
            [],
            ShopCategoryPropertyKeyCollection::class,
            null
        );
    }

    /**
     * @param string $shopCategoryPropertyKey
     * @param ShopCategoryPropertyKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCategoryPropertyKey
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopCategoryPropertyKey, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey),
            $options,
            [],
            ShopCategoryPropertyKey::class,
            $model
        );
    }

    /**
     * @param string $shopCategoryPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopCategoryPropertyKey, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey),
            $options,
            [],
            null,
            null
        );
    }
}

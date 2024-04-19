<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Shop;
use AboutYou\Cloud\AdminApi\Models\ShopCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ShopService extends AbstractService
{
    /**
     * @param Shop $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Shop
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops'),
            $options,
            [],
            Shop::class,
            $model
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @return ShopCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops'),
            $options,
            [],
            ShopCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @return Shop
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s', $shopKey),
            $options,
            [],
            Shop::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param Shop $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Shop
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s', $shopKey),
            $options,
            [],
            Shop::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomData($shopKey, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/custom-data', $shopKey),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($shopKey, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/custom-data', $shopKey),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomData($shopKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/custom-data', $shopKey),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomDataForKey($shopKey, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($shopKey, $key, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataForKey($shopKey, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key),
            $options,
            [],
            null,
            null
        );
    }
}

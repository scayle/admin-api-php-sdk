<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ShopService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Shop $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Shop
     */
    public function create($model, $options = [])
    {
        return $this->request('post', '/shops', $options, \AboutYou\Cloud\AdminApi\Models\Shop::class, $model);
    }

    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopCollection
     */
    public function all($options = [])
    {
        return $this->request('get', '/shops', $options, \AboutYou\Cloud\AdminApi\Models\ShopCollection::class);
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
     * @return \AboutYou\Cloud\AdminApi\Models\Shop
     */
    public function get($shopKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\Shop::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\Shop $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Shop
     */
    public function update($shopKey, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\Shop::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomData($shopKey, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/custom-data', $shopKey), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($shopKey, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/custom-data', $shopKey), $options, null);
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
     * @return array
     */
    public function getCustomData($shopKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/custom-data', $shopKey), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomDataForKey($shopKey, $key, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($shopKey, $key, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomDataForKey($shopKey, $key, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key), $options, null);
    }
}

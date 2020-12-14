<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ShopPropertyKeyService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey
     */
    public function create($model, $options = [])
    {
        return $this->request('post', '/shop-property-keys', $options, \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey
     */
    public function get($shopPropertyKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shop-property-keys/%s', $shopPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class);
    }

    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopPropertyKeyCollection
     */
    public function all($options = [])
    {
        return $this->request('get', '/shop-property-keys', $options, \AboutYou\Cloud\AdminApi\Models\ShopPropertyKeyCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopPropertyKey
     * @param \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey
     */
    public function update($shopPropertyKey, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shop-property-keys/%s', $shopPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopPropertyKey::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopPropertyKey, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shop-property-keys/%s', $shopPropertyKey), $options, null);
    }
}

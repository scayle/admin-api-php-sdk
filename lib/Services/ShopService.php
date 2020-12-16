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
     * @param \AboutYou\Cloud\AdminApi\Models\Assortment $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Assortment
     */
    public function updateAssortment($shopKey, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/assortment', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\Assortment::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\ShopProperty $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopProperty
     */
    public function updateOrCreateProperty($shopKey, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/properties', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopProperty::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $shopPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteProperty($shopKey, $shopPropertyKey, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/properties/%s', $shopKey, $shopPropertyKey), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $shopPropertyKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ShopProperty
     */
    public function getProperty($shopKey, $shopPropertyKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/properties/%s', $shopKey, $shopPropertyKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopProperty::class);
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
     * @return \AboutYou\Cloud\AdminApi\Models\ShopPropertyCollection
     */
    public function allProperties($shopKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/properties', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\ShopPropertyCollection::class);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Brand;
use AboutYou\Cloud\AdminApi\Models\BrandCollection;
use Psr\Http\Client\ClientExceptionInterface;

class BrandService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return BrandCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/brands'),
            $options,
            [],
            BrandCollection::class,
            null
        );
    }

    /**
     * @param int $brandId
     * @param array $options additional options like limit or filters
     *
     * @return Brand
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($brandId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/brands/%s', $brandId),
            $options,
            [],
            Brand::class,
            null
        );
    }

    /**
     * @param Brand $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Brand
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/brands'),
            $options,
            [],
            Brand::class,
            $model
        );
    }

    /**
     * @param int $brandId
     * @param Brand $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Brand
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($brandId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/brands/%s', $brandId),
            $options,
            [],
            Brand::class,
            $model
        );
    }

    /**
     * @param int $brandId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($brandId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/brands/%s', $brandId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param int $brandId
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomData($brandId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/brands/%s/custom-data', $brandId),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param int $brandId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($brandId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/brands/%s/custom-data', $brandId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param int $brandId
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomData($brandId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/brands/%s/custom-data', $brandId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param int $brandId
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomDataForKey($brandId, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/brands/%s/custom-data/%s', $brandId, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param int $brandId
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($brandId, $key, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/brands/%s/custom-data/%s', $brandId, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param int $brandId
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataForKey($brandId, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/brands/%s/custom-data/%s', $brandId, $key),
            $options,
            [],
            null,
            null
        );
    }
}

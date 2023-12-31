<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class BrandService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\BrandCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/brands'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\BrandCollection::class,
            null
        );
    }

    /**
     * @param int $brandId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Brand
     */
    public function get($brandId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/brands/%s', $brandId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Brand::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Brand $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Brand
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/brands'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Brand::class,
            $model
        );
    }

    /**
     * @param int $brandId
     * @param \AboutYou\Cloud\AdminApi\Models\Brand $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Brand
     */
    public function update($brandId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/brands/%s', $brandId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Brand::class,
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
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
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
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
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
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
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
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
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

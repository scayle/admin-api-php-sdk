<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class MerchantService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Merchant
     */
    public function get($merchantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s', $merchantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Merchant::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Merchant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Merchant
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/merchants'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Merchant::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Merchant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Merchant
     */
    public function update($merchantIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/merchants/%s', $merchantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Merchant::class,
            $model
        );
    }
}

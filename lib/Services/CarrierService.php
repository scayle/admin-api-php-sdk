<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class CarrierService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CarrierCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/carriers'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\CarrierCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $carrierIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Carrier
     */
    public function get($carrierIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/carriers/%s', $carrierIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Carrier::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Carrier $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Carrier
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/carriers'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Carrier::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $carrierIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Carrier $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Carrier
     */
    public function update($carrierIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/carriers/%s', $carrierIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Carrier::class,
            $model
        );
    }
}

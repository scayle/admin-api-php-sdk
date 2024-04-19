<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Carrier;
use AboutYou\Cloud\AdminApi\Models\CarrierCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use Psr\Http\Client\ClientExceptionInterface;

class CarrierService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return CarrierCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/carriers'),
            $options,
            [],
            CarrierCollection::class,
            null
        );
    }

    /**
     * @param Identifier $carrierIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return Carrier
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($carrierIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/carriers/%s', $carrierIdentifier),
            $options,
            [],
            Carrier::class,
            null
        );
    }

    /**
     * @param Carrier $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Carrier
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/carriers'),
            $options,
            [],
            Carrier::class,
            $model
        );
    }

    /**
     * @param Identifier $carrierIdentifier
     * @param Carrier $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Carrier
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($carrierIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/carriers/%s', $carrierIdentifier),
            $options,
            [],
            Carrier::class,
            $model
        );
    }
}

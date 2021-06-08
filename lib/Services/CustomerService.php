<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class CustomerService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function get($customerIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/customers/%s', $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Customer::class);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Customer $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function create($model, $options = [])
    {
        return $this->request('post', '/customers', $options, \AboutYou\Cloud\AdminApi\Models\Customer::class, $model);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Customer $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function update($customerIdentifier, $model, $options = [])
    {
        return $this->request('patch', $this->resolvePath('/customers/%s', $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Customer::class, $model);
    }

    /**
     * Description.
     *
     * @param int $customerId
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerReferenceKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function updateReferenceKey($customerId, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/customers/%s/reference-key', $customerId), $options, \AboutYou\Cloud\AdminApi\Models\Customer::class, $model);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerStatus
     */
    public function getStatus($customerIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/customers/%s/status', $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerStatus $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerStatus
     */
    public function updateStatus($customerIdentifier, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/customers/%s/status', $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class, $model);
    }
}

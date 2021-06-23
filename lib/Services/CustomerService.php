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
     */
    public function anonymize($customerIdentifier, $options = [])
    {
        $this->request('delete', $this->resolvePath('/customers/%s/anonymize', $customerIdentifier), $options, null);
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

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection
     */
    public function getAddresses($customerIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/customers/%s/addresses', $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection::class);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $addressIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress
     */
    public function getAddress($customerIdentifier, $addressIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/customers/%s/addresses/%s', $customerIdentifier, $addressIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress
     */
    public function createAddress($customerIdentifier, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/customers/%s/addresses', $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $model);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $addressIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress
     */
    public function updateAddress($customerIdentifier, $addressIdentifier, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/customers/%s/addresses/%s', $customerIdentifier, $addressIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $model);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param int $addressId
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerAddressReferenceKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress
     */
    public function updateAddressReferenceKey($customerIdentifier, $addressId, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/customers/%s/addresses/%s/reference-key', $customerIdentifier, $addressId), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $model);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $addressIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymizeAddress($customerIdentifier, $addressIdentifier, $options = [])
    {
        $this->request('delete', $this->resolvePath('/customers/%s/addresses/%s/anonymize', $customerIdentifier, $addressIdentifier), $options, null);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class CustomerService extends AbstractService
{
    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function get($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/customers/%s', $shopKey, $countryCode, $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Customer::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Customer $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/countries/%s/customers', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\Customer::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Customer $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function update($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        return $this->request('patch', $this->resolvePath('/shops/%s/countries/%s/customers/%s', $shopKey, $countryCode, $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Customer::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $customerId
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerReferenceKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Customer
     */
    public function updateReferenceKey($shopKey, $countryCode, $customerId, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/countries/%s/customers/%s/reference-key', $shopKey, $countryCode, $customerId), $options, \AboutYou\Cloud\AdminApi\Models\Customer::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymize($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/countries/%s/customers/%s/anonymize', $shopKey, $countryCode, $customerIdentifier), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerStatus
     */
    public function getStatus($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/customers/%s/status', $shopKey, $countryCode, $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerStatus $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerStatus
     */
    public function updateStatus($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/countries/%s/customers/%s/status', $shopKey, $countryCode, $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection
     */
    public function getAddresses($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses', $shopKey, $countryCode, $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $addressIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress
     */
    public function getAddress($shopKey, $countryCode, $customerIdentifier, $addressIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\CustomerAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerAddress
     */
    public function createAddress($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses', $shopKey, $countryCode, $customerIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
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
    public function updateAddress($shopKey, $countryCode, $customerIdentifier, $addressIdentifier, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
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
    public function updateAddressReferenceKey($shopKey, $countryCode, $customerIdentifier, $addressId, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s/reference-key', $shopKey, $countryCode, $customerIdentifier, $addressId), $options, \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $addressIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymizeAddress($shopKey, $countryCode, $customerIdentifier, $addressIdentifier, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s/anonymize', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier), $options, null);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function resetPassword($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        $this->request('post', $this->resolvePath('/shops/%s/countries/%s/customers/%s/send-reset-password-email', $shopKey, $countryCode, $customerIdentifier), $options, null);
    }
}

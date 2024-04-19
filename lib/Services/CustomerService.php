<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Customer;
use AboutYou\Cloud\AdminApi\Models\CustomerAddress;
use AboutYou\Cloud\AdminApi\Models\CustomerAddressCollection;
use AboutYou\Cloud\AdminApi\Models\CustomerAddressReferenceKey;
use AboutYou\Cloud\AdminApi\Models\CustomerCollection;
use AboutYou\Cloud\AdminApi\Models\CustomerGroup;
use AboutYou\Cloud\AdminApi\Models\CustomerMembership;
use AboutYou\Cloud\AdminApi\Models\CustomerMembershipCollection;
use AboutYou\Cloud\AdminApi\Models\CustomerPassword;
use AboutYou\Cloud\AdminApi\Models\CustomerPasswordHash;
use AboutYou\Cloud\AdminApi\Models\CustomerReferenceKey;
use AboutYou\Cloud\AdminApi\Models\CustomerStatus;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use Psr\Http\Client\ClientExceptionInterface;

class CustomerService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return CustomerCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/customers', $shopKey, $countryCode),
            $options,
            [],
            CustomerCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return Customer
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            Customer::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Customer $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Customer
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/customers', $shopKey, $countryCode),
            $options,
            [],
            Customer::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param Customer $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Customer
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        return $this->request(
            'patch',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            Customer::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $customerId
     * @param CustomerReferenceKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Customer
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateReferenceKey($shopKey, $countryCode, $customerId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/reference-key', $shopKey, $countryCode, $customerId),
            $options,
            [],
            Customer::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymize($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/anonymize', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param CustomerPassword $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function setPassword($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/password', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param CustomerPasswordHash $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function setPasswordHash($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/password-hash', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return CustomerStatus
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getStatus($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/status', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            CustomerStatus::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param CustomerStatus $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return CustomerStatus
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateStatus($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/status', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            CustomerStatus::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return CustomerAddressCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAddresses($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            CustomerAddressCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param Identifier $addressIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return CustomerAddress
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAddress($shopKey, $countryCode, $customerIdentifier, $addressIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier),
            $options,
            [],
            CustomerAddress::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param CustomerAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return CustomerAddress
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createAddress($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            CustomerAddress::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param Identifier $addressIdentifier
     * @param CustomerAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return CustomerAddress
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAddress($shopKey, $countryCode, $customerIdentifier, $addressIdentifier, $model, $options = [])
    {
        return $this->request(
            'patch',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier),
            $options,
            [],
            CustomerAddress::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param int $addressId
     * @param CustomerAddressReferenceKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return CustomerAddress
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAddressReferenceKey($shopKey, $countryCode, $customerIdentifier, $addressId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s/reference-key', $shopKey, $countryCode, $customerIdentifier, $addressId),
            $options,
            [],
            CustomerAddress::class,
            $model
        );
    }

    /**
     * @deprecated
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param Identifier $addressIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymizeAddress($shopKey, $countryCode, $customerIdentifier, $addressIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s/anonymize', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $addressIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymizeAddressByIdentifier($shopKey, $countryCode, $addressIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/customers/addresses/%s/anonymize', $shopKey, $countryCode, $addressIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function resetPassword($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/send-reset-password-email', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerId
     * @param CustomerGroup $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Customer
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function addGroups($shopKey, $countryCode, $customerId, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/customer-groups', $shopKey, $countryCode, $customerId),
            $options,
            [],
            Customer::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param CustomerMembership $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return CustomerMembership
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createMembership($shopKey, $countryCode, $customerIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/memberships', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            CustomerMembership::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $membershipId
     * @param CustomerMembership $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return CustomerMembership
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateMembership($shopKey, $countryCode, $membershipId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/customers/memberships/%s', $shopKey, $countryCode, $membershipId),
            $options,
            [],
            CustomerMembership::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return CustomerMembershipCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getMemberships($shopKey, $countryCode, $customerIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/memberships', $shopKey, $countryCode, $customerIdentifier),
            $options,
            [],
            CustomerMembershipCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $membershipId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteMembership($shopKey, $countryCode, $membershipId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/customers/memberships/%s', $shopKey, $countryCode, $membershipId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $customerIdentifier
     * @param string $customerGroup
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteGroup($shopKey, $countryCode, $customerIdentifier, $customerGroup, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/customers/%s/customer-groups/%s', $shopKey, $countryCode, $customerIdentifier, $customerGroup),
            $options,
            [],
            null,
            null
        );
    }
}

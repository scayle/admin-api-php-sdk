<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Services;

use Psr\Http\Client\ClientExceptionInterface;
use Scayle\Cloud\AdminApi\Exceptions\ApiErrorException;
use Scayle\Cloud\AdminApi\Models\Customer;
use Scayle\Cloud\AdminApi\Models\CustomerAddress;
use Scayle\Cloud\AdminApi\Models\CustomerAddressCollection;
use Scayle\Cloud\AdminApi\Models\CustomerAddressReferenceKey;
use Scayle\Cloud\AdminApi\Models\CustomerCollection;
use Scayle\Cloud\AdminApi\Models\CustomerGroup;
use Scayle\Cloud\AdminApi\Models\CustomerMembership;
use Scayle\Cloud\AdminApi\Models\CustomerMembershipCollection;
use Scayle\Cloud\AdminApi\Models\CustomerPassword;
use Scayle\Cloud\AdminApi\Models\CustomerPasswordHash;
use Scayle\Cloud\AdminApi\Models\CustomerReferenceKey;
use Scayle\Cloud\AdminApi\Models\CustomerStatus;
use Scayle\Cloud\AdminApi\Models\Identifier;

class CustomerService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        string $shopKey,
        string $countryCode,
        array $options = []
    ): CustomerCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: CustomerCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): Customer {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: Customer::class,
            body: null
        );
    }

    /**
     * @param Customer $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        string $countryCode,
        Customer $model,
        array $options = []
    ): Customer {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: Customer::class,
            body: $model
        );
    }

    /**
     * @param Customer $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        Customer $model,
        array $options = []
    ): Customer {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: Customer::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param CustomerReferenceKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateReferenceKey(
        string $shopKey,
        string $countryCode,
        int $customerId,
        CustomerReferenceKey $model,
        array $options = []
    ): Customer {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/reference-key', $shopKey, $countryCode, $customerId),
            query: $options,
            headers: [],
            modelClass: Customer::class,
            body: $model
        );
    }

    /**
     * @param array<mixed> $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateLegacyCustomData(
        string $shopKey,
        string $countryCode,
        int $customerId,
        array $model,
        array $options = []
    ): Customer {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/legacy-custom-data', $shopKey, $countryCode, $customerId),
            query: $options,
            headers: [],
            modelClass: Customer::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymize(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/anonymize', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function cancelQueuedDeletion(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/queued-deletion', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param CustomerPassword $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function setPassword(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        CustomerPassword $model,
        array $options = []
    ): void {
        $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/password', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }

    /**
     * @param CustomerPasswordHash $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function setPasswordHash(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        CustomerPasswordHash $model,
        array $options = []
    ): void {
        $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/password-hash', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getStatus(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): CustomerStatus {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/status', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerStatus::class,
            body: null
        );
    }

    /**
     * @param CustomerStatus $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateStatus(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        CustomerStatus $model,
        array $options = []
    ): CustomerStatus {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/status', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerStatus::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAddresses(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): CustomerAddressCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerAddressCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAddress(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        Identifier $addressIdentifier,
        array $options = []
    ): CustomerAddress {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerAddress::class,
            body: null
        );
    }

    /**
     * @param CustomerAddress $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createAddress(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        CustomerAddress $model,
        array $options = []
    ): CustomerAddress {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerAddress::class,
            body: $model
        );
    }

    /**
     * @param CustomerAddress $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAddress(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        Identifier $addressIdentifier,
        CustomerAddress $model,
        array $options = []
    ): CustomerAddress {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerAddress::class,
            body: $model
        );
    }

    /**
     * @param CustomerAddressReferenceKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAddressReferenceKey(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        int $addressId,
        CustomerAddressReferenceKey $model,
        array $options = []
    ): CustomerAddress {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s/reference-key', $shopKey, $countryCode, $customerIdentifier, $addressId),
            query: $options,
            headers: [],
            modelClass: CustomerAddress::class,
            body: $model
        );
    }

    /**
     * @deprecated This method is deprecated. It will be removed in a future version.
     *
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymizeAddress(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        Identifier $addressIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/addresses/%s/anonymize', $shopKey, $countryCode, $customerIdentifier, $addressIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function anonymizeAddressByIdentifier(
        string $shopKey,
        string $countryCode,
        Identifier $addressIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/addresses/%s/anonymize', $shopKey, $countryCode, $addressIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function resetPassword(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/send-reset-password-email', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param CustomerGroup $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function addGroups(
        string $shopKey,
        string $countryCode,
        Identifier $customerId,
        CustomerGroup $model,
        array $options = []
    ): Customer {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/customer-groups', $shopKey, $countryCode, $customerId),
            query: $options,
            headers: [],
            modelClass: Customer::class,
            body: $model
        );
    }

    /**
     * @param CustomerMembership $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createMembership(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        CustomerMembership $model,
        array $options = []
    ): CustomerMembership {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/memberships', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerMembership::class,
            body: $model
        );
    }

    /**
     * @param CustomerMembership $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateMembership(
        string $shopKey,
        string $countryCode,
        int $membershipId,
        CustomerMembership $model,
        array $options = []
    ): CustomerMembership {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/memberships/%s', $shopKey, $countryCode, $membershipId),
            query: $options,
            headers: [],
            modelClass: CustomerMembership::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getMemberships(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        array $options = []
    ): CustomerMembershipCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/memberships', $shopKey, $countryCode, $customerIdentifier),
            query: $options,
            headers: [],
            modelClass: CustomerMembershipCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteMembership(
        string $shopKey,
        string $countryCode,
        int $membershipId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/memberships/%s', $shopKey, $countryCode, $membershipId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteGroup(
        string $shopKey,
        string $countryCode,
        Identifier $customerIdentifier,
        string $customerGroup,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customers/%s/customer-groups/%s', $shopKey, $countryCode, $customerIdentifier, $customerGroup),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

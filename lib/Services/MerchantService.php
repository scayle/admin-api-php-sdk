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
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Merchant;
use Scayle\Cloud\AdminApi\Models\MerchantCollection;
use Scayle\Cloud\AdminApi\Models\MerchantContact;
use Scayle\Cloud\AdminApi\Models\MerchantContactCollection;
use Scayle\Cloud\AdminApi\Models\MerchantCreateOrUpdate;
use Scayle\Cloud\AdminApi\Models\MerchantReturnAddress;
use Scayle\Cloud\AdminApi\Models\MerchantReturnAddressCollection;
use Scayle\Cloud\AdminApi\Models\WarehouseCollection;

class MerchantService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): MerchantCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/merchants'),
            query: $options,
            headers: [],
            modelClass: MerchantCollection::class,
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
        Identifier $merchantIdentifier,
        array $options = []
    ): Merchant {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/merchants/%s', $merchantIdentifier),
            query: $options,
            headers: [],
            modelClass: Merchant::class,
            body: null
        );
    }

    /**
     * @param MerchantCreateOrUpdate $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        MerchantCreateOrUpdate $model,
        array $options = []
    ): MerchantCreateOrUpdate {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/merchants'),
            query: $options,
            headers: [],
            modelClass: MerchantCreateOrUpdate::class,
            body: $model
        );
    }

    /**
     * @param MerchantCreateOrUpdate $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        Identifier $merchantIdentifier,
        MerchantCreateOrUpdate $model,
        array $options = []
    ): MerchantCreateOrUpdate {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/merchants/%s', $merchantIdentifier),
            query: $options,
            headers: [],
            modelClass: MerchantCreateOrUpdate::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allContacts(
        Identifier $merchantIdentifier,
        array $options = []
    ): MerchantContactCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/merchants/%s/contacts', $merchantIdentifier),
            query: $options,
            headers: [],
            modelClass: MerchantContactCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getContact(
        Identifier $merchantIdentifier,
        int $merchantContactId,
        array $options = []
    ): MerchantContact {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
            query: $options,
            headers: [],
            modelClass: MerchantContact::class,
            body: null
        );
    }

    /**
     * @param MerchantContact $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createContact(
        Identifier $merchantIdentifier,
        MerchantContact $model,
        array $options = []
    ): MerchantContact {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/merchants/%s/contacts', $merchantIdentifier),
            query: $options,
            headers: [],
            modelClass: MerchantContact::class,
            body: $model
        );
    }

    /**
     * @param MerchantContact $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateContact(
        Identifier $merchantIdentifier,
        int $merchantContactId,
        MerchantContact $model,
        array $options = []
    ): MerchantContact {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
            query: $options,
            headers: [],
            modelClass: MerchantContact::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteContact(
        Identifier $merchantIdentifier,
        int $merchantContactId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
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
    public function allReturnAddresses(
        Identifier $merchantIdentifier,
        array $options = []
    ): MerchantReturnAddressCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/merchants/%s/return-addresses', $merchantIdentifier),
            query: $options,
            headers: [],
            modelClass: MerchantReturnAddressCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getReturnAddress(
        Identifier $merchantIdentifier,
        int $merchantReturnAddressId,
        array $options = []
    ): MerchantReturnAddress {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
            query: $options,
            headers: [],
            modelClass: MerchantReturnAddress::class,
            body: null
        );
    }

    /**
     * @param MerchantReturnAddress $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createReturnAddress(
        Identifier $merchantIdentifier,
        MerchantReturnAddress $model,
        array $options = []
    ): MerchantReturnAddress {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/merchants/%s/return-addresses', $merchantIdentifier),
            query: $options,
            headers: [],
            modelClass: MerchantReturnAddress::class,
            body: $model
        );
    }

    /**
     * @param MerchantReturnAddress $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateReturnAddress(
        Identifier $merchantIdentifier,
        int $merchantReturnAddressId,
        MerchantReturnAddress $model,
        array $options = []
    ): MerchantReturnAddress {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
            query: $options,
            headers: [],
            modelClass: MerchantReturnAddress::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteReturnAddress(
        Identifier $merchantIdentifier,
        int $merchantReturnAddressId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
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
    public function attachCarrier(
        Identifier $merchantIdentifier,
        Identifier $carrierIdentifier,
        string $countryCode,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/merchants/%s/carriers/%s/countries/%s', $merchantIdentifier, $carrierIdentifier, $countryCode),
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
    public function detachCarrier(
        Identifier $merchantIdentifier,
        Identifier $carrierIdentifier,
        string $countryCode,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/merchants/%s/carriers/%s/countries/%s', $merchantIdentifier, $carrierIdentifier, $countryCode),
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
    public function allWarehouses(
        Identifier $merchantIdentifier,
        array $options = []
    ): WarehouseCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/merchants/%s/warehouses', $merchantIdentifier),
            query: $options,
            headers: [],
            modelClass: WarehouseCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function attachWarehouse(
        Identifier $merchantIdentifier,
        Identifier $warehouseIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/merchants/%s/warehouses/%s', $merchantIdentifier, $warehouseIdentifier),
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
    public function detachWarehouse(
        Identifier $merchantIdentifier,
        Identifier $warehouseIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/merchants/%s/warehouses/%s', $merchantIdentifier, $warehouseIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

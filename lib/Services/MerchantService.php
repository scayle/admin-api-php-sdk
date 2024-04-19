<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Merchant;
use AboutYou\Cloud\AdminApi\Models\MerchantCollection;
use AboutYou\Cloud\AdminApi\Models\MerchantContact;
use AboutYou\Cloud\AdminApi\Models\MerchantContactCollection;
use AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress;
use AboutYou\Cloud\AdminApi\Models\MerchantReturnAddressCollection;
use AboutYou\Cloud\AdminApi\Models\WarehouseCollection;
use Psr\Http\Client\ClientExceptionInterface;

class MerchantService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return MerchantCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants'),
            $options,
            [],
            MerchantCollection::class,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return Merchant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($merchantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s', $merchantIdentifier),
            $options,
            [],
            Merchant::class,
            null
        );
    }

    /**
     * @param Merchant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Merchant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/merchants'),
            $options,
            [],
            Merchant::class,
            $model
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param Merchant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Merchant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($merchantIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/merchants/%s', $merchantIdentifier),
            $options,
            [],
            Merchant::class,
            $model
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return MerchantContactCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allContacts($merchantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/contacts', $merchantIdentifier),
            $options,
            [],
            MerchantContactCollection::class,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param int $merchantContactId
     * @param array $options additional options like limit or filters
     *
     * @return MerchantContact
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getContact($merchantIdentifier, $merchantContactId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
            $options,
            [],
            MerchantContact::class,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param MerchantContact $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return MerchantContact
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createContact($merchantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/merchants/%s/contacts', $merchantIdentifier),
            $options,
            [],
            MerchantContact::class,
            $model
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param int $merchantContactId
     * @param MerchantContact $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return MerchantContact
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateContact($merchantIdentifier, $merchantContactId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
            $options,
            [],
            MerchantContact::class,
            $model
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param int $merchantContactId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteContact($merchantIdentifier, $merchantContactId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return MerchantReturnAddressCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allReturnAddresses($merchantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/return-addresses', $merchantIdentifier),
            $options,
            [],
            MerchantReturnAddressCollection::class,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param int $merchantReturnAddressId
     * @param array $options additional options like limit or filters
     *
     * @return MerchantReturnAddress
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getReturnAddress($merchantIdentifier, $merchantReturnAddressId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
            $options,
            [],
            MerchantReturnAddress::class,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param MerchantReturnAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return MerchantReturnAddress
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createReturnAddress($merchantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/merchants/%s/return-addresses', $merchantIdentifier),
            $options,
            [],
            MerchantReturnAddress::class,
            $model
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param int $merchantReturnAddressId
     * @param MerchantReturnAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return MerchantReturnAddress
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateReturnAddress($merchantIdentifier, $merchantReturnAddressId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
            $options,
            [],
            MerchantReturnAddress::class,
            $model
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param int $merchantReturnAddressId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteReturnAddress($merchantIdentifier, $merchantReturnAddressId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param Identifier $carrierIdentifier
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function attachCarrier($merchantIdentifier, $carrierIdentifier, $countryCode, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/merchants/%s/carriers/%s/countries/%s', $merchantIdentifier, $carrierIdentifier, $countryCode),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param Identifier $carrierIdentifier
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function detachCarrier($merchantIdentifier, $carrierIdentifier, $countryCode, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/merchants/%s/carriers/%s/countries/%s', $merchantIdentifier, $carrierIdentifier, $countryCode),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return WarehouseCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allWarehouses($merchantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/warehouses', $merchantIdentifier),
            $options,
            [],
            WarehouseCollection::class,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param Identifier $warehouseIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function attachWarehouse($merchantIdentifier, $warehouseIdentifier, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/merchants/%s/warehouses/%s', $merchantIdentifier, $warehouseIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $merchantIdentifier
     * @param Identifier $warehouseIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function detachWarehouse($merchantIdentifier, $warehouseIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/merchants/%s/warehouses/%s', $merchantIdentifier, $warehouseIdentifier),
            $options,
            [],
            null,
            null
        );
    }
}

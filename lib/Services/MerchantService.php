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

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantContactCollection
     */
    public function allContacts($merchantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/contacts', $merchantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantContactCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param int $merchantContactId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantContact
     */
    public function getContact($merchantIdentifier, $merchantContactId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantContact::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\MerchantContact $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantContact
     */
    public function createContact($merchantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/merchants/%s/contacts', $merchantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantContact::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param int $merchantContactId
     * @param \AboutYou\Cloud\AdminApi\Models\MerchantContact $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantContact
     */
    public function updateContact($merchantIdentifier, $merchantContactId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/merchants/%s/contacts/%s', $merchantIdentifier, $merchantContactId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantContact::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
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
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddressCollection
     */
    public function allReturnAddresses($merchantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/return-addresses', $merchantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddressCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param int $merchantReturnAddressId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress
     */
    public function getReturnAddress($merchantIdentifier, $merchantReturnAddressId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress
     */
    public function createReturnAddress($merchantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/merchants/%s/return-addresses', $merchantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param int $merchantReturnAddressId
     * @param \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress
     */
    public function updateReturnAddress($merchantIdentifier, $merchantReturnAddressId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/merchants/%s/return-addresses/%s', $merchantIdentifier, $merchantReturnAddressId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
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
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $carrierIdentifier
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
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $merchantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $carrierIdentifier
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
}

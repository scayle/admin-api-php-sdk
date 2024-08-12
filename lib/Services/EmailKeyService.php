<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\EmailKey;
use AboutYou\Cloud\AdminApi\Models\EmailKeyCollection;
use Psr\Http\Client\ClientExceptionInterface;

class EmailKeyService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param EmailKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return EmailKey
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/emails/keys', $shopKey, $countryCode),
            $options,
            [],
            EmailKey::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $emailKeyId
     * @param EmailKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return EmailKey
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $countryCode, $emailKeyId, $model, $options = [])
    {
        return $this->request(
            'patch',
            $this->resolvePath('/shops/%s/countries/%s/emails/keys/%s', $shopKey, $countryCode, $emailKeyId),
            $options,
            [],
            EmailKey::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $emailKeyId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $countryCode, $emailKeyId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/emails/keys/%s', $shopKey, $countryCode, $emailKeyId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $emailKeyId
     * @param array $options additional options like limit or filters
     *
     * @return EmailKey
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopKey, $countryCode, $emailKeyId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/emails/keys/%s', $shopKey, $countryCode, $emailKeyId),
            $options,
            [],
            EmailKey::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return EmailKeyCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/emails/keys', $shopKey, $countryCode),
            $options,
            [],
            EmailKeyCollection::class,
            null
        );
    }
}

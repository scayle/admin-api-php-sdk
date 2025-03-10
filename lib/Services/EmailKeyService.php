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
use Scayle\Cloud\AdminApi\Models\EmailKey;
use Scayle\Cloud\AdminApi\Models\EmailKeyCollection;

class EmailKeyService extends AbstractService
{
    /**
     * @param EmailKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        string $countryCode,
        EmailKey $model,
        array $options = []
    ): EmailKey {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/emails/keys', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: EmailKey::class,
            body: $model
        );
    }

    /**
     * @param EmailKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        string $countryCode,
        int $emailKeyId,
        EmailKey $model,
        array $options = []
    ): EmailKey {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/emails/keys/%s', $shopKey, $countryCode, $emailKeyId),
            query: $options,
            headers: [],
            modelClass: EmailKey::class,
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
        int $emailKeyId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/emails/keys/%s', $shopKey, $countryCode, $emailKeyId),
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
    public function get(
        string $shopKey,
        string $countryCode,
        int $emailKeyId,
        array $options = []
    ): EmailKey {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/emails/keys/%s', $shopKey, $countryCode, $emailKeyId),
            query: $options,
            headers: [],
            modelClass: EmailKey::class,
            body: null
        );
    }

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
    ): EmailKeyCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/emails/keys', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: EmailKeyCollection::class,
            body: null
        );
    }
}

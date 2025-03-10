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
use Scayle\Cloud\AdminApi\Models\Shop;
use Scayle\Cloud\AdminApi\Models\ShopCollection;

class ShopService extends AbstractService
{
    /**
     * @param Shop $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Shop $model,
        array $options = []
    ): Shop {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops'),
            query: $options,
            headers: [],
            modelClass: Shop::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): ShopCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops'),
            query: $options,
            headers: [],
            modelClass: ShopCollection::class,
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
        array $options = []
    ): Shop {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s', $shopKey),
            query: $options,
            headers: [],
            modelClass: Shop::class,
            body: null
        );
    }

    /**
     * @param Shop $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        Shop $model,
        array $options = []
    ): Shop {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s', $shopKey),
            query: $options,
            headers: [],
            modelClass: Shop::class,
            body: $model
        );
    }

    /**
     * @param array<mixed> $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @return array<mixed>
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomData(
        string $shopKey,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/custom-data', $shopKey),
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
    public function deleteCustomData(
        string $shopKey,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/custom-data', $shopKey),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @return array<mixed>
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomData(
        string $shopKey,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/custom-data', $shopKey),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<mixed> $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @return array<mixed>
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomDataForKey(
        string $shopKey,
        string $key,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key),
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
    public function deleteCustomDataForKey(
        string $shopKey,
        string $key,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @return array<mixed>
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataForKey(
        string $shopKey,
        string $key,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/custom-data/%s', $shopKey, $key),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

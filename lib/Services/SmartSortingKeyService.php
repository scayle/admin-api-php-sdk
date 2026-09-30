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
use Scayle\Cloud\AdminApi\Models\SmartSortingKey;
use Scayle\Cloud\AdminApi\Models\SmartSortingKeyCollection;

class SmartSortingKeyService extends AbstractService
{
    /**
     * @param SmartSortingKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        SmartSortingKey $model,
        array $options = []
    ): SmartSortingKey {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/smart-sorting-keys'),
            query: $options,
            headers: [],
            modelClass: SmartSortingKey::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        string $sortingKeyIdentifier,
        array $options = []
    ): SmartSortingKey {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/smart-sorting-keys/%s', $sortingKeyIdentifier),
            query: $options,
            headers: [],
            modelClass: SmartSortingKey::class,
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
        array $options = []
    ): SmartSortingKeyCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/smart-sorting-keys'),
            query: $options,
            headers: [],
            modelClass: SmartSortingKeyCollection::class,
            body: null
        );
    }

    /**
     * @param SmartSortingKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $sortingKeyIdentifier,
        SmartSortingKey $model,
        array $options = []
    ): SmartSortingKey {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/smart-sorting-keys/%s', $sortingKeyIdentifier),
            query: $options,
            headers: [],
            modelClass: SmartSortingKey::class,
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
        string $sortingKeyIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/smart-sorting-keys/%s', $sortingKeyIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

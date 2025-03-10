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
use Scayle\Cloud\AdminApi\Models\Brand;
use Scayle\Cloud\AdminApi\Models\BrandCollection;

class BrandService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): BrandCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/brands'),
            query: $options,
            headers: [],
            modelClass: BrandCollection::class,
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
        int $brandId,
        array $options = []
    ): Brand {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/brands/%s', $brandId),
            query: $options,
            headers: [],
            modelClass: Brand::class,
            body: null
        );
    }

    /**
     * @param Brand $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Brand $model,
        array $options = []
    ): Brand {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/brands'),
            query: $options,
            headers: [],
            modelClass: Brand::class,
            body: $model
        );
    }

    /**
     * @param Brand $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        int $brandId,
        Brand $model,
        array $options = []
    ): Brand {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/brands/%s', $brandId),
            query: $options,
            headers: [],
            modelClass: Brand::class,
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
        int $brandId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/brands/%s', $brandId),
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
    public function createOrUpdateCustomData(
        int $brandId,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/brands/%s/custom-data', $brandId),
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
        int $brandId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/brands/%s/custom-data', $brandId),
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
        int $brandId,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/brands/%s/custom-data', $brandId),
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
        int $brandId,
        string $key,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/brands/%s/custom-data/%s', $brandId, $key),
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
        int $brandId,
        string $key,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/brands/%s/custom-data/%s', $brandId, $key),
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
        int $brandId,
        string $key,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/brands/%s/custom-data/%s', $brandId, $key),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

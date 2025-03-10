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
use Scayle\Cloud\AdminApi\Models\Assortment;
use Scayle\Cloud\AdminApi\Models\ShopCountry;
use Scayle\Cloud\AdminApi\Models\ShopCountryCollection;

class ShopCountryService extends AbstractService
{
    /**
     * @param ShopCountry $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        ShopCountry $model,
        array $options = []
    ): ShopCountry {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries', $shopKey),
            query: $options,
            headers: [],
            modelClass: ShopCountry::class,
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
        string $shopKey,
        array $options = []
    ): ShopCountryCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries', $shopKey),
            query: $options,
            headers: [],
            modelClass: ShopCountryCollection::class,
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
        array $options = []
    ): ShopCountry {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: ShopCountry::class,
            body: null
        );
    }

    /**
     * @param ShopCountry $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        string $countryCode,
        ShopCountry $model,
        array $options = []
    ): ShopCountry {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: ShopCountry::class,
            body: $model
        );
    }

    /**
     * @param Assortment $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAssortment(
        string $shopKey,
        string $countryCode,
        Assortment $model,
        array $options = []
    ): Assortment {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/assortment', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: Assortment::class,
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
        string $countryCode,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/custom-data', $shopKey, $countryCode),
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
        string $countryCode,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/custom-data', $shopKey, $countryCode),
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
        string $countryCode,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/custom-data', $shopKey, $countryCode),
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
        string $countryCode,
        string $key,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/custom-data/%s', $shopKey, $countryCode, $key),
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
        string $countryCode,
        string $key,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/custom-data/%s', $shopKey, $countryCode, $key),
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
        string $countryCode,
        string $key,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/custom-data/%s', $shopKey, $countryCode, $key),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

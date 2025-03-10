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
use Scayle\Cloud\AdminApi\Models\ShopCategory;
use Scayle\Cloud\AdminApi\Models\ShopCategoryCollection;
use Scayle\Cloud\AdminApi\Models\ShopCategoryCountry;
use Scayle\Cloud\AdminApi\Models\ShopCategoryProperty;
use Scayle\Cloud\AdminApi\Models\ShopCategoryPropertyCollection;

class ShopCategoryService extends AbstractService
{
    /**
     * @param ShopCategory $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        ShopCategory $model,
        array $options = []
    ): ShopCategory {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/categories', $shopKey),
            query: $options,
            headers: [],
            modelClass: ShopCategory::class,
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
    ): ShopCategoryCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/categories', $shopKey),
            query: $options,
            headers: [],
            modelClass: ShopCategoryCollection::class,
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
        int $shopCategoryId,
        array $options = []
    ): ShopCategory {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId),
            query: $options,
            headers: [],
            modelClass: ShopCategory::class,
            body: null
        );
    }

    /**
     * @param ShopCategory $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        int $shopCategoryId,
        ShopCategory $model,
        array $options = []
    ): ShopCategory {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId),
            query: $options,
            headers: [],
            modelClass: ShopCategory::class,
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
        int $shopCategoryId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s', $shopKey, $shopCategoryId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param ShopCategoryProperty $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateProperty(
        string $shopKey,
        string $countryCode,
        int $shopCategoryId,
        ShopCategoryProperty $model,
        array $options = []
    ): ShopCategoryProperty {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties', $shopKey, $countryCode, $shopCategoryId),
            query: $options,
            headers: [],
            modelClass: ShopCategoryProperty::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteProperty(
        string $shopKey,
        string $countryCode,
        int $shopCategoryId,
        string $shopCategoryPropertyKey,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties/%s', $shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey),
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
    public function getProperty(
        string $shopKey,
        string $countryCode,
        int $shopCategoryId,
        string $shopCategoryPropertyKey,
        array $options = []
    ): ShopCategoryProperty {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties/%s', $shopKey, $countryCode, $shopCategoryId, $shopCategoryPropertyKey),
            query: $options,
            headers: [],
            modelClass: ShopCategoryProperty::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allProperties(
        string $shopKey,
        string $countryCode,
        int $shopCategoryId,
        array $options = []
    ): ShopCategoryPropertyCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/categories/%s/properties', $shopKey, $countryCode, $shopCategoryId),
            query: $options,
            headers: [],
            modelClass: ShopCategoryPropertyCollection::class,
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
        string $shopKey,
        int $shopCategoryId,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId),
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
        int $shopCategoryId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId),
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
        int $shopCategoryId,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/custom-data', $shopKey, $shopCategoryId),
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
        int $shopCategoryId,
        string $key,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key),
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
        int $shopCategoryId,
        string $key,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key),
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
        int $shopCategoryId,
        string $key,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/custom-data/%s', $shopKey, $shopCategoryId, $key),
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
    public function createOrUpdateCustomDataForCountry(
        string $shopKey,
        int $shopCategoryId,
        string $countryCode,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode),
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
    public function deleteCustomDataForCountry(
        string $shopKey,
        int $shopCategoryId,
        string $countryCode,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode),
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
    public function getCustomDataForCountry(
        string $shopKey,
        int $shopCategoryId,
        string $countryCode,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data', $shopKey, $shopCategoryId, $countryCode),
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
    public function createOrUpdateCustomDataKeyForCountry(
        string $shopKey,
        int $shopCategoryId,
        string $countryCode,
        string $key,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key),
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
    public function deleteCustomDataKeyForCountry(
        string $shopKey,
        int $shopCategoryId,
        string $countryCode,
        string $key,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key),
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
    public function getCustomDataKeyForCountry(
        string $shopKey,
        int $shopCategoryId,
        string $countryCode,
        string $key,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/categories/%s/countries/%s/custom-data/%s', $shopKey, $shopCategoryId, $countryCode, $key),
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
    public function getCountry(
        string $shopKey,
        string $countryCode,
        int $shopCategoryId,
        array $options = []
    ): ShopCategoryCountry {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/categories/%s', $shopKey, $countryCode, $shopCategoryId),
            query: $options,
            headers: [],
            modelClass: ShopCategoryCountry::class,
            body: null
        );
    }

    /**
     * @param ShopCategoryCountry $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateCountry(
        string $shopKey,
        string $countryCode,
        int $shopCategoryId,
        ShopCategoryCountry $model,
        array $options = []
    ): ShopCategoryCountry {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/categories/%s', $shopKey, $countryCode, $shopCategoryId),
            query: $options,
            headers: [],
            modelClass: ShopCategoryCountry::class,
            body: $model
        );
    }
}

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
use Scayle\Cloud\AdminApi\Models\ShopCategoryPropertyKey;
use Scayle\Cloud\AdminApi\Models\ShopCategoryPropertyKeyCollection;

class ShopCategoryPropertyKeyService extends AbstractService
{
    /**
     * @param ShopCategoryPropertyKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        ShopCategoryPropertyKey $model,
        array $options = []
    ): ShopCategoryPropertyKey {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shop-category-property-keys'),
            query: $options,
            headers: [],
            modelClass: ShopCategoryPropertyKey::class,
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
        string $shopCategoryPropertyKey,
        array $options = []
    ): ShopCategoryPropertyKey {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey),
            query: $options,
            headers: [],
            modelClass: ShopCategoryPropertyKey::class,
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
    ): ShopCategoryPropertyKeyCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shop-category-property-keys'),
            query: $options,
            headers: [],
            modelClass: ShopCategoryPropertyKeyCollection::class,
            body: null
        );
    }

    /**
     * @param ShopCategoryPropertyKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopCategoryPropertyKey,
        ShopCategoryPropertyKey $model,
        array $options = []
    ): ShopCategoryPropertyKey {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey),
            query: $options,
            headers: [],
            modelClass: ShopCategoryPropertyKey::class,
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
        string $shopCategoryPropertyKey,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shop-category-property-keys/%s', $shopCategoryPropertyKey),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

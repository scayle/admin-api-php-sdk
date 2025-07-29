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
use Scayle\Cloud\AdminApi\Models\Attribute;
use Scayle\Cloud\AdminApi\Models\AttributeCollection;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\ProductVariant;
use Scayle\Cloud\AdminApi\Models\ProductVariantCollection;

class ProductVariantService extends AbstractService
{
    /**
     * @param ProductVariant $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Identifier $productIdentifier,
        ProductVariant $model,
        array $options = []
    ): ProductVariant {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/variants', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariant::class,
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
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        array $options = []
    ): ProductVariant {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariant::class,
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
        Identifier $productIdentifier,
        array $options = []
    ): ProductVariantCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/variants', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariantCollection::class,
            body: null
        );
    }

    /**
     * @param ProductVariant $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        ProductVariant $model,
        array $options = []
    ): ProductVariant {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariant::class,
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
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param Attribute $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateAttribute(
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        Attribute $model,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/variants/%s/attributes', $productIdentifier, $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: Attribute::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAttribute(
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/variants/%s/attributes/%s', $productIdentifier, $variantIdentifier, $attributeGroupName),
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
    public function getAttribute(
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        string $attributeGroupName,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/variants/%s/attributes/%s', $productIdentifier, $variantIdentifier, $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: Attribute::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allAttributes(
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        array $options = []
    ): AttributeCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/variants/%s/attributes', $productIdentifier, $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: AttributeCollection::class,
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
        Identifier $variantIdentifier,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/variants/%s/custom-data', $variantIdentifier),
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
        Identifier $variantIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/variants/%s/custom-data', $variantIdentifier),
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
        Identifier $variantIdentifier,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/variants/%s/custom-data', $variantIdentifier),
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
        Identifier $variantIdentifier,
        string $key,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/variants/%s/custom-data/%s', $variantIdentifier, $key),
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
        Identifier $variantIdentifier,
        string $key,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/variants/%s/custom-data/%s', $variantIdentifier, $key),
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
        Identifier $variantIdentifier,
        string $key,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/variants/%s/custom-data/%s', $variantIdentifier, $key),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param ProductVariant $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createComposite(
        Identifier $productIdentifier,
        ProductVariant $model,
        array $options = []
    ): ProductVariant {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/composite/%s/variants', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariant::class,
            body: $model
        );
    }

    /**
     * @param ProductVariant $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateComposite(
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        ProductVariant $model,
        array $options = []
    ): ProductVariant {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/composite/%s/variants/%s', $productIdentifier, $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariant::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteComposite(
        Identifier $productIdentifier,
        Identifier $variantIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/composite/%s/variants/%s', $productIdentifier, $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

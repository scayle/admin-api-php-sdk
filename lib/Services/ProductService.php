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
use Scayle\Cloud\AdminApi\Models\BulkRequest;
use Scayle\Cloud\AdminApi\Models\CreateBulkRequest;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Product;
use Scayle\Cloud\AdminApi\Models\ProductCollection;
use Scayle\Cloud\AdminApi\Models\ProductMasterCategories;
use Scayle\Cloud\AdminApi\Models\ProductState;

class ProductService extends AbstractService
{
    /**
     * @param Product $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Product $model,
        array $options = []
    ): Product {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products'),
            query: $options,
            headers: [],
            modelClass: Product::class,
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
        array $options = []
    ): Product {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: Product::class,
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
    ): ProductCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products'),
            query: $options,
            headers: [],
            modelClass: ProductCollection::class,
            body: null
        );
    }

    /**
     * @param Product $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        Identifier $productIdentifier,
        Product $model,
        array $options = []
    ): Product {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/%s', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: Product::class,
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
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s', $productIdentifier),
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
        Attribute $model,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/attributes', $productIdentifier),
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
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/attributes/%s', $productIdentifier, $attributeGroupName),
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
        string $attributeGroupName,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/attributes/%s', $productIdentifier, $attributeGroupName),
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
        array $options = []
    ): AttributeCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/attributes', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: AttributeCollection::class,
            body: null
        );
    }

    /**
     * @param ProductMasterCategories $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateMasterCategories(
        Identifier $productIdentifier,
        ProductMasterCategories $model,
        array $options = []
    ): ProductMasterCategories {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/%s/master-categories', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductMasterCategories::class,
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
        Identifier $productIdentifier,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/%s/custom-data', $productIdentifier),
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
        Identifier $productIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/custom-data', $productIdentifier),
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
        Identifier $productIdentifier,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/custom-data', $productIdentifier),
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
        Identifier $productIdentifier,
        string $key,
        array $model,
        array $options = []
    ): array {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/%s/custom-data/%s', $productIdentifier, $key),
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
        Identifier $productIdentifier,
        string $key,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/custom-data/%s', $productIdentifier, $key),
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
        Identifier $productIdentifier,
        string $key,
        array $options = []
    ): array {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/custom-data/%s', $productIdentifier, $key),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param Product $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createComposite(
        Product $model,
        array $options = []
    ): Product {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/composite'),
            query: $options,
            headers: [],
            modelClass: Product::class,
            body: $model
        );
    }

    /**
     * @param Product $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateComposite(
        Identifier $productIdentifier,
        Product $model,
        array $options = []
    ): Product {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/composite/%s', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: Product::class,
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
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/composite/%s', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param ProductState $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateState(
        Identifier $productIdentifier,
        ProductState $model,
        array $options = []
    ): ProductState {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/%s/state', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductState::class,
            body: $model
        );
    }

    /**
     * @param CreateBulkRequest $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createBulkRequest(
        CreateBulkRequest $model,
        array $options = []
    ): BulkRequest {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/bulk-requests'),
            query: $options,
            headers: [],
            modelClass: BulkRequest::class,
            body: $model
        );
    }

    /**
     * @param CreateBulkRequest $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createCompositeProductBulkRequest(
        CreateBulkRequest $model,
        array $options = []
    ): BulkRequest {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/composite/bulk-requests'),
            query: $options,
            headers: [],
            modelClass: BulkRequest::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function unlockAttributeGroup(
        Identifier $productIdentifier,
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/attributes/%s/unlock', $productIdentifier, $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

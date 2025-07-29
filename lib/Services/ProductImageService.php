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
use Scayle\Cloud\AdminApi\Models\ProductImage;
use Scayle\Cloud\AdminApi\Models\ProductImageCollection;
use Scayle\Cloud\AdminApi\Models\ProductImagePosition;

class ProductImageService extends AbstractService
{
    /**
     * @param ProductImage $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Identifier $productIdentifier,
        ProductImage $model,
        array $options = []
    ): ProductImage {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/images', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductImage::class,
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
        Identifier $productIdentifier,
        array $options = []
    ): ProductImageCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/images', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductImageCollection::class,
            body: null
        );
    }

    /**
     * @param ProductImagePosition $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updatePosition(
        Identifier $productIdentifier,
        Identifier $imageIdentifier,
        ProductImagePosition $model,
        array $options = []
    ): ProductImage {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/products/%s/images/%s', $productIdentifier, $imageIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductImage::class,
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
        Identifier $imageIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/images/%s', $productIdentifier, $imageIdentifier),
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
        Identifier $imageIdentifier,
        Attribute $model,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/images/%s/attributes', $productIdentifier, $imageIdentifier),
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
        Identifier $imageIdentifier,
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/images/%s/attributes/%s', $productIdentifier, $imageIdentifier, $attributeGroupName),
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
        Identifier $imageIdentifier,
        string $attributeGroupName,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/images/%s/attributes/%s', $productIdentifier, $imageIdentifier, $attributeGroupName),
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
        Identifier $imageIdentifier,
        array $options = []
    ): AttributeCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/images/%s/attributes', $productIdentifier, $imageIdentifier),
            query: $options,
            headers: [],
            modelClass: AttributeCollection::class,
            body: null
        );
    }
}

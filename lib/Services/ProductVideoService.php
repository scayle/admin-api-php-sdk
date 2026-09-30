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
use Scayle\Cloud\AdminApi\Models\ProductVideo;
use Scayle\Cloud\AdminApi\Models\ProductVideoCollection;
use Scayle\Cloud\AdminApi\Models\ProductVideoPosition;

class ProductVideoService extends AbstractService
{
    /**
     * @param ProductVideo $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Identifier $productIdentifier,
        ProductVideo $model,
        array $options = []
    ): ProductVideo {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/videos', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVideo::class,
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
    ): ProductVideoCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/videos', $productIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVideoCollection::class,
            body: null
        );
    }

    /**
     * @param ProductVideoPosition $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updatePosition(
        Identifier $productIdentifier,
        Identifier $productVideoIdentifier,
        ProductVideoPosition $model,
        array $options = []
    ): ProductVideo {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/products/%s/videos/%s', $productIdentifier, $productVideoIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVideo::class,
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
        Identifier $productVideoIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/videos/%s', $productIdentifier, $productVideoIdentifier),
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
        Identifier $productVideoIdentifier,
        Attribute $model,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/videos/%s/attributes', $productIdentifier, $productVideoIdentifier),
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
        Identifier $productVideoIdentifier,
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/products/%s/videos/%s/attributes/%s', $productIdentifier, $productVideoIdentifier, $attributeGroupName),
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
        Identifier $productVideoIdentifier,
        string $attributeGroupName,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/videos/%s/attributes/%s', $productIdentifier, $productVideoIdentifier, $attributeGroupName),
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
        Identifier $productVideoIdentifier,
        array $options = []
    ): AttributeCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/products/%s/videos/%s/attributes', $productIdentifier, $productVideoIdentifier),
            query: $options,
            headers: [],
            modelClass: AttributeCollection::class,
            body: null
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
        Identifier $productVideoIdentifier,
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/products/%s/videos/%s/attributes/%s/unlock', $productIdentifier, $productVideoIdentifier, $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

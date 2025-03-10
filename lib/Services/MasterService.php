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
use Scayle\Cloud\AdminApi\Models\ProductMasterCategories;

class MasterService extends AbstractService
{
    /**
     * @param ProductMasterCategories $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateProductMasterMasterCategories(
        Identifier $productMasterIdentifier,
        ProductMasterCategories $model,
        array $options = []
    ): ProductMasterCategories {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/product-masters/%s/master-categories', $productMasterIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductMasterCategories::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allAttributes(
        Identifier $productMasterIdentifier,
        array $options = []
    ): AttributeCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/product-masters/%s/attributes', $productMasterIdentifier),
            query: $options,
            headers: [],
            modelClass: AttributeCollection::class,
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
        Identifier $productMasterIdentifier,
        Attribute $model,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/product-masters/%s/attributes', $productMasterIdentifier),
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
    public function getAttribute(
        Identifier $productMasterIdentifier,
        string $attributeGroupName,
        array $options = []
    ): Attribute {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/product-masters/%s/attributes/%s', $productMasterIdentifier, $attributeGroupName),
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
    public function deleteAttribute(
        Identifier $productMasterIdentifier,
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/product-masters/%s/attributes/%s', $productMasterIdentifier, $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

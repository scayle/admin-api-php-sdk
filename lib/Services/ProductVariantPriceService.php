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
use Scayle\Cloud\AdminApi\Models\BulkRequest;
use Scayle\Cloud\AdminApi\Models\CreateBulkRequest;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\ProductVariantPrice;
use Scayle\Cloud\AdminApi\Models\ProductVariantPriceCollection;

class ProductVariantPriceService extends AbstractService
{
    /**
     * @param ProductVariantPrice $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Identifier $variantIdentifier,
        ProductVariantPrice $model,
        array $options = []
    ): ProductVariantPrice {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/variants/%s/prices', $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariantPrice::class,
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
        Identifier $variantIdentifier,
        array $options = []
    ): ProductVariantPriceCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/variants/%s/prices', $variantIdentifier),
            query: $options,
            headers: [],
            modelClass: ProductVariantPriceCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        Identifier $variantIdentifier,
        string $priceKey,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/variants/%s/prices/%s', $variantIdentifier, $priceKey),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
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
            relativeUrl: $this->resolvePath('/variants/prices/bulk-requests'),
            query: $options,
            headers: [],
            modelClass: BulkRequest::class,
            body: $model
        );
    }
}

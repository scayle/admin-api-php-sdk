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
use Scayle\Cloud\AdminApi\Models\ProductsFirstLiveAt;

class ProductsFirstLiveAtService extends AbstractService
{
    /**
     * @param ProductsFirstLiveAt $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateProductsFirstLiveAt(
        ProductsFirstLiveAt $model,
        array $options = []
    ): void {
        $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/products/first-live-at'),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }
}

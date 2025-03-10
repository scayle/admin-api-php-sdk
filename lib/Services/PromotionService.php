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
use Scayle\Cloud\AdminApi\Models\Promotion;
use Scayle\Cloud\AdminApi\Models\PromotionCollection;

class PromotionService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): PromotionCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/promotions'),
            query: $options,
            headers: [],
            modelClass: PromotionCollection::class,
            body: null
        );
    }

    /**
     * @param Promotion $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Promotion $model,
        array $options = []
    ): Promotion {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/promotions'),
            query: $options,
            headers: [],
            modelClass: Promotion::class,
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
        string $promotionId,
        array $options = []
    ): Promotion {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/promotions/%s', $promotionId),
            query: $options,
            headers: [],
            modelClass: Promotion::class,
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
        string $promotionId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/promotions/%s', $promotionId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param Promotion $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $promotionId,
        Promotion $model,
        array $options = []
    ): Promotion {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/promotions/%s', $promotionId),
            query: $options,
            headers: [],
            modelClass: Promotion::class,
            body: $model
        );
    }
}

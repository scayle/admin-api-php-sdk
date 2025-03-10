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
use Scayle\Cloud\AdminApi\Models\PromotionCodeCollection;
use Scayle\Cloud\AdminApi\Models\PromotionCodes;

class PromotionCodesService extends AbstractService
{
    /**
     * @param PromotionCodes $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $promotionId,
        PromotionCodes $model,
        array $options = []
    ): PromotionCodes {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/promotions/%s/codes', $promotionId),
            query: $options,
            headers: [],
            modelClass: PromotionCodes::class,
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
        string $promotionId,
        array $options = []
    ): PromotionCodeCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/promotions/%s/codes', $promotionId),
            query: $options,
            headers: [],
            modelClass: PromotionCodeCollection::class,
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
            relativeUrl: $this->resolvePath('/promotions/%s/codes', $promotionId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

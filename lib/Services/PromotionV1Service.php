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
use Scayle\Cloud\AdminApi\Models\PromotionV1;

class PromotionV1Service extends AbstractService
{
    /**
     * @param PromotionV1 $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        PromotionV1 $model,
        array $options = []
    ): PromotionV1 {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/create-promotion'),
            query: $options,
            headers: [],
            modelClass: PromotionV1::class,
            body: $model
        );
    }

    /**
     * @param PromotionV1 $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $promotionId,
        PromotionV1 $model,
        array $options = []
    ): PromotionV1 {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/update-promotion/%s', $promotionId),
            query: $options,
            headers: [],
            modelClass: PromotionV1::class,
            body: $model
        );
    }
}

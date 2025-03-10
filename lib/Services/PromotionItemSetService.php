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
use Scayle\Cloud\AdminApi\Models\PromotionItemSet;
use Scayle\Cloud\AdminApi\Models\PromotionItemSetCollection;

class PromotionItemSetService extends AbstractService
{
    /**
     * @param PromotionItemSet $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        PromotionItemSet $model,
        array $options = []
    ): PromotionItemSet {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/promotions/item-sets'),
            query: $options,
            headers: [],
            modelClass: PromotionItemSet::class,
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
        string $id,
        array $options = []
    ): PromotionItemSet {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/promotions/item-sets/%s', $id),
            query: $options,
            headers: [],
            modelClass: PromotionItemSet::class,
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
        string $promotionItemSetId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/promotions/item-sets/%s', $promotionItemSetId),
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
    public function all(
        array $options = []
    ): PromotionItemSetCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/promotions/item-sets'),
            query: $options,
            headers: [],
            modelClass: PromotionItemSetCollection::class,
            body: null
        );
    }
}

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
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreCategory;
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreRule;
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreRuleCollection;
use Scayle\Cloud\AdminApi\Models\ProductQualityScoreRuleUpdateOrCreateRequest;

class ProductQualityScoreRuleService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): ProductQualityScoreRuleCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/product-quality-scores/rules'),
            query: $options,
            headers: [],
            modelClass: ProductQualityScoreRuleCollection::class,
            body: null
        );
    }

    /**
     * @param ProductQualityScoreRuleUpdateOrCreateRequest $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        ProductQualityScoreRuleUpdateOrCreateRequest $model,
        array $options = []
    ): ProductQualityScoreRule {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/product-quality-scores/rules'),
            query: $options,
            headers: [],
            modelClass: ProductQualityScoreRule::class,
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
        int $ruleId,
        array $options = []
    ): ProductQualityScoreRule {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/product-quality-scores/rules/%s', $ruleId),
            query: $options,
            headers: [],
            modelClass: ProductQualityScoreRule::class,
            body: null
        );
    }

    /**
     * @param ProductQualityScoreRuleUpdateOrCreateRequest $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        int $ruleId,
        ProductQualityScoreRuleUpdateOrCreateRequest $model,
        array $options = []
    ): ProductQualityScoreRule {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/product-quality-scores/rules/%s', $ruleId),
            query: $options,
            headers: [],
            modelClass: ProductQualityScoreRule::class,
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
        int $ruleId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/product-quality-scores/rules/%s', $ruleId),
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
    public function attach(
        int $ruleId,
        int $categoryId,
        array $options = []
    ): ProductQualityScoreRule {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/product-quality-scores/rules/%s/categories/%s', $ruleId, $categoryId),
            query: $options,
            headers: [],
            modelClass: ProductQualityScoreRule::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function detach(
        int $ruleId,
        int $categoryId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/product-quality-scores/rules/%s/categories/%s', $ruleId, $categoryId),
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
    public function getCategory(
        int $categoryId,
        array $options = []
    ): ProductQualityScoreCategory {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/product-quality-scores/categories/%s', $categoryId),
            query: $options,
            headers: [],
            modelClass: ProductQualityScoreCategory::class,
            body: null
        );
    }
}

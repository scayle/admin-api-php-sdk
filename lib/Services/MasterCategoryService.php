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
use Scayle\Cloud\AdminApi\Models\MasterCategory;
use Scayle\Cloud\AdminApi\Models\MasterCategoryCollection;

class MasterCategoryService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): MasterCategoryCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/master-categories'),
            query: $options,
            headers: [],
            modelClass: MasterCategoryCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        int $masterCategoryId,
        array $options = []
    ): MasterCategory {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/master-categories/%s', $masterCategoryId),
            query: $options,
            headers: [],
            modelClass: MasterCategory::class,
            body: null
        );
    }

    /**
     * @param MasterCategory $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        MasterCategory $model,
        array $options = []
    ): MasterCategory {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/master-categories'),
            query: $options,
            headers: [],
            modelClass: MasterCategory::class,
            body: $model
        );
    }

    /**
     * @param MasterCategory $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        int $masterCategoryId,
        MasterCategory $model,
        array $options = []
    ): MasterCategory {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/master-categories/%s', $masterCategoryId),
            query: $options,
            headers: [],
            modelClass: MasterCategory::class,
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
        int $masterCategoryId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/master-categories/%s', $masterCategoryId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

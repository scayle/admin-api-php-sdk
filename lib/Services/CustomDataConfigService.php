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
use Scayle\Cloud\AdminApi\Models\CustomDataConfig;

class CustomDataConfigService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        string $entity,
        array $options = []
    ): CustomDataConfig {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/custom-data-configs/%s', $entity),
            query: $options,
            headers: [],
            modelClass: CustomDataConfig::class,
            body: null
        );
    }

    /**
     * @param CustomDataConfig $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $entity,
        CustomDataConfig $model,
        array $options = []
    ): CustomDataConfig {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/custom-data-configs/%s', $entity),
            query: $options,
            headers: [],
            modelClass: CustomDataConfig::class,
            body: $model
        );
    }

    /**
     * @param CustomDataConfig $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $entity,
        CustomDataConfig $model,
        array $options = []
    ): CustomDataConfig {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/custom-data-configs/%s', $entity),
            query: $options,
            headers: [],
            modelClass: CustomDataConfig::class,
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
        string $entity,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/custom-data-configs/%s', $entity),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

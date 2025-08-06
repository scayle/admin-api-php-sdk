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
use Scayle\Cloud\AdminApi\Models\ArrayCollection;

class AttributeTranslationService extends AbstractService
{
    /**
     * @param array<mixed> $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreate(
        string $attributeGroupName,
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/attributes/%s/translations', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }

    /**
     * @param array<mixed> $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function partialUpdateOrCreate(
        string $attributeGroupName,
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/attributes/%s/translations', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: null,
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
        string $attributeGroupName,
        array $options = []
    ): ArrayCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/attributes/%s/translations', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: ArrayCollection::class,
            body: null
        );
    }

    /**
     * @param array<mixed> $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateAdvanced(
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/attributes/translations'),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }
}

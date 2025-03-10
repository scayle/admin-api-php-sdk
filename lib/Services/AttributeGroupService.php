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
use Scayle\Cloud\AdminApi\Models\AttributeGroup;
use Scayle\Cloud\AdminApi\Models\AttributeGroupAttribute;
use Scayle\Cloud\AdminApi\Models\AttributeGroupCollection;

class AttributeGroupService extends AbstractService
{
    /**
     * @param AttributeGroup $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        AttributeGroup $model,
        array $options = []
    ): AttributeGroup {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/attribute-groups'),
            query: $options,
            headers: [],
            modelClass: AttributeGroup::class,
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
        string $attributeGroupName,
        array $options = []
    ): AttributeGroup {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: AttributeGroup::class,
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
    ): AttributeGroupCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/attribute-groups'),
            query: $options,
            headers: [],
            modelClass: AttributeGroupCollection::class,
            body: null
        );
    }

    /**
     * @param AttributeGroup $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $attributeGroupName,
        AttributeGroup $model,
        array $options = []
    ): AttributeGroup {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: AttributeGroup::class,
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
        string $attributeGroupName,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: null,
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
    public function updateFrontendName(
        string $attributeGroupName,
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/attribute-groups/%s/frontend-name', $attributeGroupName),
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
    public function getAttributes(
        string $attributeGroupName,
        array $options = []
    ): ArrayCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/attribute-groups/%s/attributes', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: ArrayCollection::class,
            body: null
        );
    }

    /**
     * @param AttributeGroupAttribute $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createAttribute(
        string $attributeGroupName,
        AttributeGroupAttribute $model,
        array $options = []
    ): AttributeGroupAttribute {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/attribute-groups/%s/attributes', $attributeGroupName),
            query: $options,
            headers: [],
            modelClass: AttributeGroupAttribute::class,
            body: $model
        );
    }

    /**
     * @param AttributeGroupAttribute $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAttribute(
        string $attributeGroupName,
        string $attributeValue,
        AttributeGroupAttribute $model,
        array $options = []
    ): AttributeGroupAttribute {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/attribute-groups/%s/attributes/%s', $attributeGroupName, $attributeValue),
            query: $options,
            headers: [],
            modelClass: AttributeGroupAttribute::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAttribute(
        string $attributeGroupName,
        string $attributeValue,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/attribute-groups/%s/attributes/%s', $attributeGroupName, $attributeValue),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

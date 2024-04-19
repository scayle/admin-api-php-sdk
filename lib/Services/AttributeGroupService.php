<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ArrayCollection;
use AboutYou\Cloud\AdminApi\Models\AttributeGroup;
use AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute;
use AboutYou\Cloud\AdminApi\Models\AttributeGroupCollection;
use Psr\Http\Client\ClientExceptionInterface;

class AttributeGroupService extends AbstractService
{
    /**
     * @param AttributeGroup $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return AttributeGroup
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/attribute-groups'),
            $options,
            [],
            AttributeGroup::class,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @return AttributeGroup
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            $options,
            [],
            AttributeGroup::class,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @return AttributeGroupCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/attribute-groups'),
            $options,
            [],
            AttributeGroupCollection::class,
            null
        );
    }

    /**
     * @param string $attributeGroupName
     * @param AttributeGroup $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return AttributeGroup
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($attributeGroupName, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            $options,
            [],
            AttributeGroup::class,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($attributeGroupName, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $attributeGroupName
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateFrontendName($attributeGroupName, $model, $options = [])
    {
        $this->request(
            'put',
            $this->resolvePath('/attribute-groups/%s/frontend-name', $attributeGroupName),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @return ArrayCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAttributes($attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/attribute-groups/%s/attributes', $attributeGroupName),
            $options,
            [],
            ArrayCollection::class,
            null
        );
    }

    /**
     * @param string $attributeGroupName
     * @param AttributeGroupAttribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return AttributeGroupAttribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createAttribute($attributeGroupName, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/attribute-groups/%s/attributes', $attributeGroupName),
            $options,
            [],
            AttributeGroupAttribute::class,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param string $attributeValue
     * @param AttributeGroupAttribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return AttributeGroupAttribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAttribute($attributeGroupName, $attributeValue, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/attribute-groups/%s/attributes/%s', $attributeGroupName, $attributeValue),
            $options,
            [],
            AttributeGroupAttribute::class,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param string $attributeValue
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAttribute($attributeGroupName, $attributeValue, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/attribute-groups/%s/attributes/%s', $attributeGroupName, $attributeValue),
            $options,
            [],
            null,
            null
        );
    }
}

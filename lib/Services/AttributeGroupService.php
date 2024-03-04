<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class AttributeGroupService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\AttributeGroup $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroup
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/attribute-groups'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AttributeGroup::class,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroup
     */
    public function get($attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AttributeGroup::class,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroupCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/attribute-groups'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AttributeGroupCollection::class,
            null
        );
    }

    /**
     * @param string $attributeGroupName
     * @param \AboutYou\Cloud\AdminApi\Models\AttributeGroup $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroup
     */
    public function update($attributeGroupName, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/attribute-groups/%s', $attributeGroupName),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AttributeGroup::class,
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
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ArrayCollection
     */
    public function getAttributes($attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/attribute-groups/%s/attributes', $attributeGroupName),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ArrayCollection::class,
            null
        );
    }

    /**
     * @param string $attributeGroupName
     * @param \AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute
     */
    public function createAttribute($attributeGroupName, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/attribute-groups/%s/attributes', $attributeGroupName),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute::class,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param string $attributeValue
     * @param \AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute
     */
    public function updateAttribute($attributeGroupName, $attributeValue, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/attribute-groups/%s/attributes/%s', $attributeGroupName, $attributeValue),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AttributeGroupAttribute::class,
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

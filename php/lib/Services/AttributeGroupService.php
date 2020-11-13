<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class AttributeGroupService extends AbstractService
{
    /**
     * Description.
     *
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
        return $this->request('post', '/attribute-groups', $options, \AboutYou\Cloud\AdminApi\Models\AttributeGroup::class, $model);
    }

    /**
     * Description.
     *
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
        return $this->request('get', $this->resolvePath('/attribute-groups/%s', $attributeGroupName), $options, \AboutYou\Cloud\AdminApi\Models\AttributeGroup::class);
    }

    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroupCollection
     */
    public function all($options = [])
    {
        return $this->request('get', '/attribute-groups', $options, \AboutYou\Cloud\AdminApi\Models\AttributeGroupCollection::class);
    }

    /**
     * Description.
     *
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
        return $this->request('put', $this->resolvePath('/attribute-groups/%s', $attributeGroupName), $options, \AboutYou\Cloud\AdminApi\Models\AttributeGroup::class, $model);
    }

    /**
     * Description.
     *
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($attributeGroupName, $options = [])
    {
        $this->request('delete', $this->resolvePath('/attribute-groups/%s', $attributeGroupName), $options, null);
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\MasterCategory;
use AboutYou\Cloud\AdminApi\Models\MasterCategoryCollection;
use Psr\Http\Client\ClientExceptionInterface;

class MasterCategoryService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return MasterCategoryCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/master-categories'),
            $options,
            [],
            MasterCategoryCollection::class,
            null
        );
    }

    /**
     * @param int $masterCategoryId
     * @param array $options additional options like limit or filters
     *
     * @return MasterCategory
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($masterCategoryId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/master-categories/%s', $masterCategoryId),
            $options,
            [],
            MasterCategory::class,
            null
        );
    }

    /**
     * @param MasterCategory $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return MasterCategory
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/master-categories'),
            $options,
            [],
            MasterCategory::class,
            $model
        );
    }

    /**
     * @param int $masterCategoryId
     * @param MasterCategory $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return MasterCategory
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($masterCategoryId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/master-categories/%s', $masterCategoryId),
            $options,
            [],
            MasterCategory::class,
            $model
        );
    }

    /**
     * @param int $masterCategoryId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($masterCategoryId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/master-categories/%s', $masterCategoryId),
            $options,
            [],
            null,
            null
        );
    }
}

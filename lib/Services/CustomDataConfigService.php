<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class CustomDataConfigService extends AbstractService
{
    /**
     * @param string $entity
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomDataConfig
     */
    public function get($entity, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/custom-data-configs/%s', $entity),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\CustomDataConfig::class,
            null
        );
    }

    /**
     * @param string $entity
     * @param \AboutYou\Cloud\AdminApi\Models\CustomDataConfig $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomDataConfig
     */
    public function create($entity, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/custom-data-configs/%s', $entity),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\CustomDataConfig::class,
            $model
        );
    }

    /**
     * @param string $entity
     * @param \AboutYou\Cloud\AdminApi\Models\CustomDataConfig $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CustomDataConfig
     */
    public function update($entity, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/custom-data-configs/%s', $entity),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\CustomDataConfig::class,
            $model
        );
    }

    /**
     * @param string $entity
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($entity, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/custom-data-configs/%s', $entity),
            $options,
            [],
            null,
            null
        );
    }
}

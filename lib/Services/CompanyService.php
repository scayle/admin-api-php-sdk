<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class CompanyService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Company $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Company
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/companies'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Company::class,
            $model
        );
    }

    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CompanyCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/companies'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\CompanyCollection::class,
            null
        );
    }

    /**
     * Description.
     *
     * @param int $companyId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Company
     */
    public function get($companyId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/companies/%s', $companyId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Company::class,
            null
        );
    }

    /**
     * Description.
     *
     * @param int $companyId
     * @param \AboutYou\Cloud\AdminApi\Models\Company $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Company
     */
    public function update($companyId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/companies/%s', $companyId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Company::class,
            $model
        );
    }
}

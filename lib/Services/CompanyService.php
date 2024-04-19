<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Company;
use AboutYou\Cloud\AdminApi\Models\CompanyCollection;
use Psr\Http\Client\ClientExceptionInterface;

class CompanyService extends AbstractService
{
    /**
     * @param Company $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Company
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/companies'),
            $options,
            [],
            Company::class,
            $model
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @return CompanyCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/companies'),
            $options,
            [],
            CompanyCollection::class,
            null
        );
    }

    /**
     * @param int $companyId
     * @param array $options additional options like limit or filters
     *
     * @return Company
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($companyId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/companies/%s', $companyId),
            $options,
            [],
            Company::class,
            null
        );
    }

    /**
     * @param int $companyId
     * @param Company $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Company
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($companyId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/companies/%s', $companyId),
            $options,
            [],
            Company::class,
            $model
        );
    }
}

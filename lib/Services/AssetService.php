<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class AssetService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Asset $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AssetUrl
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/assets'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AssetUrl::class,
            $model
        );
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Asset;
use AboutYou\Cloud\AdminApi\Models\AssetUrl;
use Psr\Http\Client\ClientExceptionInterface;

class AssetService extends AbstractService
{
    /**
     * @param Asset $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return AssetUrl
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/assets'),
            $options,
            [],
            AssetUrl::class,
            $model
        );
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Audience;
use AboutYou\Cloud\AdminApi\Models\AudienceCollection;
use AboutYou\Cloud\AdminApi\Models\AudienceUpdateRequest;
use Psr\Http\Client\ClientExceptionInterface;

class AudienceService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return AudienceCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAudiences($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions/audiences'),
            $options,
            [],
            AudienceCollection::class,
            null
        );
    }

    /**
     * @param Audience $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Audience
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createAudience($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/promotions/audiences'),
            $options,
            [],
            Audience::class,
            $model
        );
    }

    /**
     * @param string $audienceId
     * @param array $options additional options like limit or filters
     *
     * @return Audience
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAudience($audienceId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions/audiences/%s', $audienceId),
            $options,
            [],
            Audience::class,
            null
        );
    }

    /**
     * @param string $audienceId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAudience($audienceId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/promotions/audiences/%s', $audienceId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $audienceId
     * @param AudienceUpdateRequest $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Audience
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAudience($audienceId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/promotions/audiences/%s', $audienceId),
            $options,
            [],
            Audience::class,
            $model
        );
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\AudienceCollection;
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
}

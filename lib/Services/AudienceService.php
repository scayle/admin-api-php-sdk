<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class AudienceService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AudienceCollection
     */
    public function getAudiences($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions/audiences'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AudienceCollection::class,
            null
        );
    }
}

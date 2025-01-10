<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\BulkRequestStatus;
use AboutYou\Cloud\AdminApi\Models\BulkRequestStatusCollection;
use Psr\Http\Client\ClientExceptionInterface;

class BulkRequestStatusService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return BulkRequestStatusCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/bulk-requests'),
            $options,
            [],
            BulkRequestStatusCollection::class,
            null
        );
    }

    /**
     * @param int $requestKey
     * @param array $options additional options like limit or filters
     *
     * @return BulkRequestStatus
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($requestKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/bulk-requests/%s/status', $requestKey),
            $options,
            [],
            BulkRequestStatus::class,
            null
        );
    }
}

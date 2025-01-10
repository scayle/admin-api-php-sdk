<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\BulkRequestStatus;
use Psr\Http\Client\ClientExceptionInterface;

class BulkRequestService extends AbstractService
{
    /**
     * @param int $requestKey
     * @param array $options additional options like limit or filters
     *
     * @return BulkRequestStatus
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function cancel($requestKey, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/bulk-requests/%s/cancel', $requestKey),
            $options,
            [],
            BulkRequestStatus::class,
            null
        );
    }
}

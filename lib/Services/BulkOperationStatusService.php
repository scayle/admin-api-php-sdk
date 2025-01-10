<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\BulkOperationStatus;
use Psr\Http\Client\ClientExceptionInterface;

class BulkOperationStatusService extends AbstractService
{
    /**
     * @param int $requestKey
     * @param string $operationKey
     * @param array $options additional options like limit or filters
     *
     * @return BulkOperationStatus
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($requestKey, $operationKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/bulk-requests/%s/operations/%s/status', $requestKey, $operationKey),
            $options,
            [],
            BulkOperationStatus::class,
            null
        );
    }
}

<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Services;

use Psr\Http\Client\ClientExceptionInterface;
use Scayle\Cloud\AdminApi\Exceptions\ApiErrorException;
use Scayle\Cloud\AdminApi\Models\BulkRequestStatus;
use Scayle\Cloud\AdminApi\Models\BulkRequestStatusCollection;

class BulkRequestStatusService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): BulkRequestStatusCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/bulk-requests'),
            query: $options,
            headers: [],
            modelClass: BulkRequestStatusCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        int $requestKey,
        array $options = []
    ): BulkRequestStatus {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/bulk-requests/%s/status', $requestKey),
            query: $options,
            headers: [],
            modelClass: BulkRequestStatus::class,
            body: null
        );
    }
}

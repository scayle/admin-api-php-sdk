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

class BulkRequestService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function cancel(
        int $requestKey,
        array $options = []
    ): BulkRequestStatus {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/bulk-requests/%s/cancel', $requestKey),
            query: $options,
            headers: [],
            modelClass: BulkRequestStatus::class,
            body: null
        );
    }
}

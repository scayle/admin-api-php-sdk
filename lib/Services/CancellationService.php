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
use Scayle\Cloud\AdminApi\Helpers\ArrayHelper;
use Scayle\Cloud\AdminApi\Models\Cancellation;

class CancellationService extends AbstractService
{
    /**
     * @param Cancellation $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function send(
        Cancellation $model,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/fulfillment/cancellations'),
            query: ArrayHelper::except($options, ['companyId']),
            headers: ['X-Company-Id' => ArrayHelper::get($options, 'companyId')],
            modelClass: null,
            body: $model
        );
    }
}

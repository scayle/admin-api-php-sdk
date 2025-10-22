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
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Order;
use Scayle\Cloud\AdminApi\Models\OrderBillingStatus;

class OrderBillingStatusService extends AbstractService
{
    /**
     * @param OrderBillingStatus $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrderBillingStatus(
        string $shopKey,
        string $countryCode,
        Identifier $orderId,
        OrderBillingStatus $model,
        array $options = []
    ): Order {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/billing-status', $shopKey, $countryCode, $orderId),
            query: $options,
            headers: [],
            modelClass: Order::class,
            body: $model
        );
    }
}

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
use Scayle\Cloud\AdminApi\Models\OrderItem;

class OrderItemService extends AbstractService
{
    /**
     * @param array<mixed> $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateLegacyCustomData(
        string $shopKey,
        string $countryCode,
        int $orderId,
        int $orderItemId,
        array $model,
        array $options = []
    ): OrderItem {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/items/%s/legacy-custom-data', $shopKey, $countryCode, $orderId, $orderItemId),
            query: $options,
            headers: [],
            modelClass: OrderItem::class,
            body: $model
        );
    }
}

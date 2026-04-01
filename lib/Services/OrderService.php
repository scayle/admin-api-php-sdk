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
use Scayle\Cloud\AdminApi\Models\OrderCollection;
use Scayle\Cloud\AdminApi\Models\OrderInvoiceCollection;
use Scayle\Cloud\AdminApi\Models\OrderReferenceKey;
use Scayle\Cloud\AdminApi\Models\OrderStatus;
use Scayle\Cloud\AdminApi\Models\SubscriptionOrder;

class OrderService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        string $shopKey,
        string $countryCode,
        Identifier $orderIdentifier,
        array $options = []
    ): Order {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s', $shopKey, $countryCode, $orderIdentifier),
            query: $options,
            headers: [],
            modelClass: Order::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        string $shopKey,
        string $countryCode,
        array $options = []
    ): OrderCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: OrderCollection::class,
            body: null
        );
    }

    /**
     * @param OrderReferenceKey $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateReferenceKey(
        string $shopKey,
        string $countryCode,
        int $orderId,
        OrderReferenceKey $model,
        array $options = []
    ): Order {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/reference-key', $shopKey, $countryCode, $orderId),
            query: $options,
            headers: [],
            modelClass: Order::class,
            body: $model
        );
    }

    /**
     * @param Order $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        string $countryCode,
        Order $model,
        array $options = []
    ): Order {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: Order::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        string $shopKey,
        string $countryCode,
        Identifier $orderIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s', $shopKey, $countryCode, $orderIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getStatus(
        string $shopKey,
        string $countryCode,
        Identifier $orderIdentifier,
        array $options = []
    ): OrderStatus {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/status', $shopKey, $countryCode, $orderIdentifier),
            query: $options,
            headers: [],
            modelClass: OrderStatus::class,
            body: null
        );
    }

    /**
     * @param SubscriptionOrder $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createSubscriptionOrder(
        string $shopKey,
        string $countryCode,
        SubscriptionOrder $model,
        array $options = []
    ): Order {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/subscription-orders', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: Order::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getOrderInvoices(
        string $shopKey,
        string $countryCode,
        Identifier $orderIdentifier,
        array $options = []
    ): OrderInvoiceCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/invoices', $shopKey, $countryCode, $orderIdentifier),
            query: $options,
            headers: [],
            modelClass: OrderInvoiceCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getOrderInvoice(
        string $shopKey,
        string $countryCode,
        Identifier $orderIdentifier,
        int $invoiceId,
        array $options = []
    ): string {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/invoices/%s', $shopKey, $countryCode, $orderIdentifier, $invoiceId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

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
        Identifier $orderIdentifier,
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/legacy-custom-data', $shopKey, $countryCode, $orderIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function triggerManualCapture(
        string $shopKey,
        string $countryCode,
        Identifier $orderIdentifier,
        array $options = []
    ): Order {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/orders/%s/payment/manual-capture', $shopKey, $countryCode, $orderIdentifier),
            query: $options,
            headers: [],
            modelClass: Order::class,
            body: null
        );
    }
}

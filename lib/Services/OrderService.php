<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Order;
use AboutYou\Cloud\AdminApi\Models\OrderCollection;
use AboutYou\Cloud\AdminApi\Models\OrderInvoiceCollection;
use AboutYou\Cloud\AdminApi\Models\OrderReferenceKey;
use AboutYou\Cloud\AdminApi\Models\OrderStatus;
use AboutYou\Cloud\AdminApi\Models\SubscriptionOrder;
use Psr\Http\Client\ClientExceptionInterface;

class OrderService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $orderIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return Order
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($shopKey, $countryCode, $orderIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s', $shopKey, $countryCode, $orderIdentifier),
            $options,
            [],
            Order::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return OrderCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/orders', $shopKey, $countryCode),
            $options,
            [],
            OrderCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $orderId
     * @param OrderReferenceKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Order
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateReferenceKey($shopKey, $countryCode, $orderId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s/reference-key', $shopKey, $countryCode, $orderId),
            $options,
            [],
            Order::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Order $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Order
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/orders', $shopKey, $countryCode),
            $options,
            [],
            Order::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $orderIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $countryCode, $orderIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s', $shopKey, $countryCode, $orderIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $orderIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return OrderStatus
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getStatus($shopKey, $countryCode, $orderIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s/status', $shopKey, $countryCode, $orderIdentifier),
            $options,
            [],
            OrderStatus::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param SubscriptionOrder $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Order
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createSubscriptionOrder($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/orders/subscription-orders', $shopKey, $countryCode),
            $options,
            [],
            Order::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $orderIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return OrderInvoiceCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getOrderInvoices($shopKey, $countryCode, $orderIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s/invoices', $shopKey, $countryCode, $orderIdentifier),
            $options,
            [],
            OrderInvoiceCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Identifier $orderIdentifier
     * @param int $invoiceId
     * @param array $options additional options like limit or filters
     *
     * @return string
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getOrderInvoice($shopKey, $countryCode, $orderIdentifier, $invoiceId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s/invoices/%s', $shopKey, $countryCode, $orderIdentifier, $invoiceId),
            $options,
            [],
            null,
            null
        );
    }
}

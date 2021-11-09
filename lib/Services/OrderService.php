<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class OrderService extends AbstractService
{
    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $orderIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Order
     */
    public function get($shopKey, $countryCode, $orderIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s', $shopKey, $countryCode, $orderIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Order::class,
            null
        );
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $orderId
     * @param \AboutYou\Cloud\AdminApi\Models\OrderReferenceKey $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Order
     */
    public function updateReferenceKey($shopKey, $countryCode, $orderId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s/reference-key', $shopKey, $countryCode, $orderId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Order::class,
            $model
        );
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $orderIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\OrderStatus
     */
    public function getStatus($shopKey, $countryCode, $orderIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/orders/%s/status', $shopKey, $countryCode, $orderIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\OrderStatus::class,
            null
        );
    }
}

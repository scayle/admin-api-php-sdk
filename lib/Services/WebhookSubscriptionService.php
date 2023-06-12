<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class WebhookSubscriptionService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\WebhookSubscription $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\WebhookSubscription
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/webhooks/subscriptions'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\WebhookSubscription::class,
            $model
        );
    }

    /**
     * @param int $subscriptionId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\WebhookSubscription
     */
    public function get($subscriptionId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/webhooks/subscriptions/%s', $subscriptionId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\WebhookSubscription::class,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\WebhookSubscriptionCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/webhooks/subscriptions'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\WebhookSubscriptionCollection::class,
            null
        );
    }

    /**
     * @param int $subscriptionId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($subscriptionId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/webhooks/subscriptions/%s', $subscriptionId),
            $options,
            [],
            null,
            null
        );
    }
}

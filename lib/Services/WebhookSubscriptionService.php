<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\WebhookSubscription;
use AboutYou\Cloud\AdminApi\Models\WebhookSubscriptionCollection;
use Psr\Http\Client\ClientExceptionInterface;

class WebhookSubscriptionService extends AbstractService
{
    /**
     * @param WebhookSubscription $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return WebhookSubscription
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/webhooks/subscriptions'),
            $options,
            [],
            WebhookSubscription::class,
            $model
        );
    }

    /**
     * @param int $subscriptionId
     * @param array $options additional options like limit or filters
     *
     * @return WebhookSubscription
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($subscriptionId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/webhooks/subscriptions/%s', $subscriptionId),
            $options,
            [],
            WebhookSubscription::class,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @return WebhookSubscriptionCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/webhooks/subscriptions'),
            $options,
            [],
            WebhookSubscriptionCollection::class,
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

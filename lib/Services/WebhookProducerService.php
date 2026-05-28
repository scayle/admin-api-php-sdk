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
use Scayle\Cloud\AdminApi\Models\WebhookProducerEventCollection;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscription;
use Scayle\Cloud\AdminApi\Models\WebhookProducerSubscriptionCollection;

class WebhookProducerService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allEvents(
        string $producerIdentifier,
        array $options = []
    ): WebhookProducerEventCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/webhooks/producers/%s/events', $producerIdentifier),
            query: $options,
            headers: [],
            modelClass: WebhookProducerEventCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allSubscriptions(
        string $producerIdentifier,
        array $options = []
    ): WebhookProducerSubscriptionCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/webhooks/producers/%s/subscriptions', $producerIdentifier),
            query: $options,
            headers: [],
            modelClass: WebhookProducerSubscriptionCollection::class,
            body: null
        );
    }

    /**
     * @param WebhookProducerSubscription $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createSubscription(
        string $producerIdentifier,
        WebhookProducerSubscription $model,
        array $options = []
    ): WebhookProducerSubscription {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/webhooks/producers/%s/subscriptions', $producerIdentifier),
            query: $options,
            headers: [],
            modelClass: WebhookProducerSubscription::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getSubscription(
        string $producerIdentifier,
        int $subscriptionId,
        array $options = []
    ): WebhookProducerSubscription {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/webhooks/producers/%s/subscriptions/%s', $producerIdentifier, $subscriptionId),
            query: $options,
            headers: [],
            modelClass: WebhookProducerSubscription::class,
            body: null
        );
    }

    /**
     * @param WebhookProducerSubscription $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateSubscription(
        string $producerIdentifier,
        int $subscriptionId,
        WebhookProducerSubscription $model,
        array $options = []
    ): WebhookProducerSubscription {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/webhooks/producers/%s/subscriptions/%s', $producerIdentifier, $subscriptionId),
            query: $options,
            headers: [],
            modelClass: WebhookProducerSubscription::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteSubscription(
        string $producerIdentifier,
        int $subscriptionId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/webhooks/producers/%s/subscriptions/%s', $producerIdentifier, $subscriptionId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

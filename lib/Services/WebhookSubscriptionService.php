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
use Scayle\Cloud\AdminApi\Models\WebhookSubscription;
use Scayle\Cloud\AdminApi\Models\WebhookSubscriptionCollection;

class WebhookSubscriptionService extends AbstractService
{
    /**
     * @param WebhookSubscription $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        WebhookSubscription $model,
        array $options = []
    ): WebhookSubscription {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/webhooks/subscriptions'),
            query: $options,
            headers: [],
            modelClass: WebhookSubscription::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        int $subscriptionId,
        array $options = []
    ): WebhookSubscription {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/webhooks/subscriptions/%s', $subscriptionId),
            query: $options,
            headers: [],
            modelClass: WebhookSubscription::class,
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
        array $options = []
    ): WebhookSubscriptionCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/webhooks/subscriptions'),
            query: $options,
            headers: [],
            modelClass: WebhookSubscriptionCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        int $subscriptionId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/webhooks/subscriptions/%s', $subscriptionId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}

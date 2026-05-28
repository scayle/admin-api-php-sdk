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

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property int $id Subscription ID.
 * @property string $externalId Identifier in an external system; must be unique per producer when set.
 * @property string $eventName Event name this subscription listens to.
 * @property string $url Delivery URL including scheme (HTTP or HTTPS).
 * @property array<mixed> $target Subscription scope context (for example company or shop country identifiers) used for routing and filtering.
 * @property bool $enabled When false, webhooks are not delivered until re-enabled.
 * @property string $disabledReason Set when the subscription was automatically disabled (for example due to excessive delivery failures). The only sentinel value exposed today is `max_suspensions`.
 * @property mixed $auth
 * @property array<string> $customHeaders Extra HTTP headers attached to webhook requests.
 * @property int $rpm Maximum delivery requests per minute for this subscription.
 * @property string $suspendedUntil When set, deliveries are deferred until after this timestamp.
 * @property string $email Notification email (for example when a subscription becomes suspended).
 * @property bool $isInternal When true, the subscription is used for a managed integration path. When false, notifications are sent to the HTTPS URL you configure in `url`.
 */
class WebhookProducerSubscription extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
        'enabled' => true,
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'auth' => WebhookProducerSubscriptionBasicAuth::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];
}

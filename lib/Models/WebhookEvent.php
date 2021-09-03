<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $event
 * @property int $version The version of the hook.
 * @property string $description Explaination for the hook.
 * @property bool $isDeprecated The webhook event is deprecated and is not allowed for new subscriptions.
 * @property bool $isBlocking Indicates whether the event triggers a blocking or non-blocking webhook.
 */
class WebhookEvent extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

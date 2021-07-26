<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The unique webhook identifier.
 * @property string $event Name of the hook event.
 * @property int $version The version of the hook.
 * @property string $url The url that will be called whenever the hook is triggered.
 */
class WebhookSubscription extends ApiObject
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

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\WebhookSubscription[] $entities
 */
class WebhookSubscriptionCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => WebhookSubscription::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\WebhookSubscription[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

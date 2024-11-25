<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property WebhookSubscription[] $entities
 */
class WebhookSubscriptionCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => WebhookSubscription::class,
    ];

    /**
     * @return WebhookSubscription[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

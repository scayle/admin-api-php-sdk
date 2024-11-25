<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property WebhookEvent[] $entities
 */
class WebhookEventCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => WebhookEvent::class,
    ];

    /**
     * @return WebhookEvent[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

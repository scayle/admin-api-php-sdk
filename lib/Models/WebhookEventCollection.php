<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\WebhookEvent[] $entities
 */
class WebhookEventCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => WebhookEvent::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\WebhookEvent[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

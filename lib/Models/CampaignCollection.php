<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Campaign[] $entities
 */
class CampaignCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Campaign::class,
    ];

    /**
     * @return Campaign[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Campaign[] $entities
 */
class CampaignCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Campaign::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

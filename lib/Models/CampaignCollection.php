<?php

namespace AboutYou\Cloud\AdminApi\Models;

class CampaignCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\Campaign::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

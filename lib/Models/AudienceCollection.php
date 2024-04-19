<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Audience[] $entities
 */
class AudienceCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Audience::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Audience[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

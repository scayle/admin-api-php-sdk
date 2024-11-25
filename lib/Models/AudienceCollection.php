<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Audience[] $entities
 */
class AudienceCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Audience::class,
    ];

    /**
     * @return Audience[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

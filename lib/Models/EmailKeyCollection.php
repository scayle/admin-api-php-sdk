<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\EmailKey[] $entities
 */
class EmailKeyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => EmailKey::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\EmailKey[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

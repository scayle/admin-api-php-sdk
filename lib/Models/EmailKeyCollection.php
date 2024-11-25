<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property EmailKey[] $entities
 */
class EmailKeyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => EmailKey::class,
    ];

    /**
     * @return EmailKey[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

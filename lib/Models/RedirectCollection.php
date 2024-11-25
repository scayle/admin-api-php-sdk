<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Redirect[] $entities
 */
class RedirectCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Redirect::class,
    ];

    /**
     * @return Redirect[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

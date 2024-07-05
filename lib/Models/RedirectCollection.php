<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Redirect[] $entities
 */
class RedirectCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Redirect::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Redirect[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

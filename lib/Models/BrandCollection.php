<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Brand[] $entities
 */
class BrandCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Brand::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Brand[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

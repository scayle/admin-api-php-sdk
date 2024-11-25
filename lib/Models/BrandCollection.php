<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Brand[] $entities
 */
class BrandCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Brand::class,
    ];

    /**
     * @return Brand[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property PackageGroup[] $entities
 */
class PackageGroupCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => PackageGroup::class,
    ];

    /**
     * @return PackageGroup[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

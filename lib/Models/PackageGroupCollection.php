<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\PackageGroup[] $entities
 */
class PackageGroupCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => \AboutYou\Cloud\AdminApi\Models\PackageGroup::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\PackageGroup[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

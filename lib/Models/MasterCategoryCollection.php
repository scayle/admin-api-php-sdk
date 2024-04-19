<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\MasterCategory[] $entities
 */
class MasterCategoryCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => MasterCategory::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\MasterCategory[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

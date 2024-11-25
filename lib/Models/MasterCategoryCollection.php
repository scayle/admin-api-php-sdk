<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property MasterCategory[] $entities
 */
class MasterCategoryCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => MasterCategory::class,
    ];

    /**
     * @return MasterCategory[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

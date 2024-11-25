<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property AttributeGroup[] $entities
 */
class AttributeGroupCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => AttributeGroup::class,
    ];

    /**
     * @return AttributeGroup[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\AttributeGroup[] $entities
 */
class AttributeGroupCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => AttributeGroup::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroup[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Attribute[] $entities
 */
class AttributeCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Attribute::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Attribute[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

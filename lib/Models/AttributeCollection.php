<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Attribute[] $entities
 */
class AttributeCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Attribute::class,
    ];

    /**
     * @return Attribute[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

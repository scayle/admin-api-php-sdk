<?php

namespace AboutYou\Cloud\AdminApi\Models;

class AttributeGroupCollection extends ApiCollection
{
	protected $collectionClassMap = [
		'entities' => \AboutYou\Cloud\AdminApi\Models\AttributeGroup::class,
    ];

    /**
    * @return \AboutYou\Cloud\AdminApi\Models\AttributeGroup[]
    */
    public function getEntities()
    {
        return $this->entities;
    }
}
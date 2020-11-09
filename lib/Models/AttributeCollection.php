<?php

namespace AboutYou\Cloud\AdminApi\Models;

class AttributeCollection extends ApiCollection
{
	protected $collectionClassMap = [
		'entities' => \AboutYou\Cloud\AdminApi\Models\Attribute::class,
    ];

    /**
    * @return \AboutYou\Cloud\AdminApi\Models\Attribute[]
    */
    public function getEntities()
    {
        return $this->entities;
    }
}
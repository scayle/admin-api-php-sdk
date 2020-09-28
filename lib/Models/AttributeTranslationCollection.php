<?php

namespace AboutYou\Cloud\AdminApi\Models;

class AttributeTranslationCollection extends ApiCollection
{
	protected $collectionClassMap = [
		'entities' => \AboutYou\Cloud\AdminApi\Models\AttributeTranslation::class,
    ];

    /**
    * @return \AboutYou\Cloud\AdminApi\Models\AttributeTranslation[]
    */
    public function getEntities()
    {
        return $this->entities;
    }
}
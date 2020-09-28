<?php

namespace AboutYou\Cloud\AdminApi\Models;

class ProductCollection extends ApiCollection
{
	protected $collectionClassMap = [
		'entities' => \AboutYou\Cloud\AdminApi\Models\Product::class,
    ];

    /**
    * @return \AboutYou\Cloud\AdminApi\Models\Product[]
    */
    public function getEntities()
    {
        return $this->entities;
    }
}
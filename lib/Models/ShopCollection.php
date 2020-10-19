<?php

namespace AboutYou\Cloud\AdminApi\Models;

class ShopCollection extends ApiCollection
{
	protected $collectionClassMap = [
		'entities' => \AboutYou\Cloud\AdminApi\Models\Shop::class,
    ];

    /**
    * @return \AboutYou\Cloud\AdminApi\Models\Shop[]
    */
    public function getEntities()
    {
        return $this->entities;
    }
}
<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Company[] $entities
 */
class CompanyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Company::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Company[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

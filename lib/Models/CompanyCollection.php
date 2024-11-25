<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Company[] $entities
 */
class CompanyCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Company::class,
    ];

    /**
     * @return Company[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\CustomerMembership[] $entities
 */
class CustomerMembershipCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => CustomerMembership::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\CustomerMembership[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

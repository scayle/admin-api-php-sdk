<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property CustomerMembership[] $entities
 */
class CustomerMembershipCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => CustomerMembership::class,
    ];

    /**
     * @return CustomerMembership[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

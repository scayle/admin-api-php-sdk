<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property BulkRequestStatus[] $entities
 */
class BulkRequestStatusCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => BulkRequestStatus::class,
    ];

    /**
     * @return BulkRequestStatus[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}

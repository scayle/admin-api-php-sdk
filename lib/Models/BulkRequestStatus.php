<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $key Bulk request identifier
 * @property string $status Status of the bulk request
 * @property BulkRequestProgress $progress
 */
class BulkRequestStatus extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'progress' => BulkRequestProgress::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

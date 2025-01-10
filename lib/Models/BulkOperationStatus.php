<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $key Operation key, that is unique within the given bulk request
 * @property string $status Status of the bulk operation
 * @property BulkOperationResponse $response
 * @property BulkRequestStatus $bulkRequest
 */
class BulkOperationStatus extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'response' => BulkOperationResponse::class,
        'bulkRequest' => BulkRequestStatus::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

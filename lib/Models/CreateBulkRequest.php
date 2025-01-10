<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property BulkRequestCallbacks $callbacks
 * @property CreateBulkOperation[] $operations
 */
class CreateBulkRequest extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'callbacks' => BulkRequestCallbacks::class,
    ];

    protected $collectionClassMap = [
        'operations' => CreateBulkOperation::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

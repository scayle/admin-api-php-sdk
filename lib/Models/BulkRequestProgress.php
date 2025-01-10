<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $totalOperations Total number of operations
 * @property int $processedOperations Number of processed operations
 * @property int $failedOperations Number of failed operations
 */
class BulkRequestProgress extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

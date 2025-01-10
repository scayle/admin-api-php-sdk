<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property array $body Operation response body. Can be null if operation doesn't return any response (e.g. 204 status code)
 * @property int $statusCode Operation response status code.
 */
class BulkOperationResponse extends ApiObject
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

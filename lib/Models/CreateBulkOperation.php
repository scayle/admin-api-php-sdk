<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $key Operation key, which is unique within the given bulk request
 * @property string $url Operation relative url
 * @property string $method Operation HTTP method
 * @property array $headers Operation additional HTTP headers
 * @property array $body Operation request body
 */
class CreateBulkOperation extends ApiObject
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

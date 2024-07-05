<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id id of the redirects
 * @property string $source url of the source
 * @property string $target url of the target
 * @property int $statusCode status of the redirects
 * @property bool $isRegex
 * @property array $parent
 * @property int $priority
 * @property string $createdAt Timestamp when the redirect is created
 * @property string $updatedAt Timestamp when the redirect is updated
 */
class Redirect extends ApiObject
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

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id id of the redirect
 * @property string $source url of the source
 * @property string $target url of the target
 * @property int $statusCode status of the redirect
 * @property bool $isRegex
 * @property Redirect $parent
 * @property int $priority
 * @property RedirectError $error
 * @property string $createdAt Timestamp when the redirect is created
 * @property string $updatedAt Timestamp when the redirect is updated
 */
class Redirect extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'parent' => Redirect::class,
        'error' => RedirectError::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

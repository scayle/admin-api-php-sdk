<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $hashingType
 * @property string $hash
 */
class CustomerPasswordHash extends ApiObject
{
    protected $defaultValues = [
        'hashingType' => 'internal',
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

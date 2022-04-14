<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $status Phases of order e.g: cancelled , delivered
 */
class OrderStatus extends ApiObject
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

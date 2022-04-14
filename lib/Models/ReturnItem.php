<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $received Timestamp when the product return is received
 * @property string $returnKey A key that is assigned to uniquely identify a return request
 * @property string $returnReason Description of why the return is initiated
 */
class ReturnItem extends ApiObject
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

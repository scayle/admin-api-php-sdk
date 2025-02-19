<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $number Invoice identifier number
 * @property string $fullNumber Invoice identifier number that customer views on Order page
 */
class Invoice extends ApiObject
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

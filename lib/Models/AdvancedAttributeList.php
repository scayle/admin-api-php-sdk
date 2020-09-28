<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name 
 * @property string $type 
 * @property array[][]|array[] $value 
 * @property bool $isLocked 
 * @property array $shopSpecific 
 */
class AdvancedAttributeList extends ApiObject
{
    protected $defaultValues = [
        'type' => 'advancedList',
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
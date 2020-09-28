<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name 
 * @property string $type 
 * @property string[]|int[]|bool[] $value 
 * @property bool $isLocked 
 * @property array $shopSpecific 
 */
class SimpleAttributeList extends ApiObject
{
    protected $defaultValues = [
        'type' => 'simpleList',
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
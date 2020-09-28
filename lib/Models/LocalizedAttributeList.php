<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name 
 * @property string $type 
 * @property array[] $value 
 * @property bool $isLocked 
 * @property array $shopSpecific 
 */
class LocalizedAttributeList extends ApiObject
{
    protected $defaultValues = [
        'type' => 'localizedStringList',
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
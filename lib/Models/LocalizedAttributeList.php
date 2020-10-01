<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name The attribute name.
 * @property string $type The attribute type. In this case always localizedStringList.
 * @property array[] $value The attribute value. In this case always an array of dictionaries mapping locale to translation.
 * @property bool $isLocked Specifies if the attribute was locked via the Cloud Panel.
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
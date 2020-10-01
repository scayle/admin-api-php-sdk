<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name The attribute name
 * @property string $type The attribute type. In this case always advanced.
 * @property array[]|array $value The attribute value. In this case it is an array or object.
 * @property bool $isLocked Specifies if the attribute was locked via the Cloud Panel.
 * @property array $shopSpecific Used to override the attribute value for a specific Shop.
 */
class AdvancedAttribute extends ApiObject
{
    protected $defaultValues = [
        'type' => 'advanced',
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
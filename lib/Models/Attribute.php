<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name The attribute name.
 * @property string $type The attribute type. In this case always simple.
 * @property mixed $value The attribute value where the datatype is defined by the type property.
 * @property bool $isLocked Specifies if the attribute was locked via Commerce Suite Panel.
 * @property array $shopSpecific Used to override the attribute value for a specific shop.
 */
class Attribute extends ApiObject
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

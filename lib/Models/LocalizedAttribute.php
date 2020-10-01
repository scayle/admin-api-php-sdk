<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name The attribute name.
 * @property string $type The attribute type. In this case always localizedString.
 * @property array $value The attribute value. In this case always a dictionary mapping locale to translation.
 * @property bool $isLocked Specifies if the attribute was locked via the Cloud Panel.
 * @property array $shopSpecific Used to override the attribute value for a specific Shop.
 */
class LocalizedAttribute extends ApiObject
{
    protected $defaultValues = [
        'type' => 'localizedString',
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
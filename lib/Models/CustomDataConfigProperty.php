<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name Name of the property.
 * @property string $type Type of the property.
 * @property bool $isLocalized Whether the property is localized or not.
 * @property mixed $defaultValue Default value for the property.
 * @property array $rules A collection of rules that applies to the corresponding property in the entity custom data.
 * @property bool $inherit Whether the property is inheritable or not this would apply for entities
 * having parent entities or self referencing like categories.
 */
class CustomDataConfigProperty extends ApiObject
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

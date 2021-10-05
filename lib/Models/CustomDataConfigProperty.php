<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name Name of the property.
 * @property string $type Type of the property.
 * @property bool $isLocalized Whether the property is localized or not. Default is `false`, supported only for config properties of type `json` and `string`. Toggling `isLocalized` from `true` to `false` is not supported. If `isLocalized` is set to `true` then `requiredLocales` rule is mandatory.
 * @property mixed $defaultValue Default value for the property. If `required` rule is set to `true` then `defaultValue` is mandatory.
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

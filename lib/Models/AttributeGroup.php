<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the attribute group created by Backbone Core.
 * @property string $name A name, that uniquely identifies an attribute group.
 * @property array $frontendName The localized attribute group name. At least the base language that is configured in Backbone Core is mandatory.
 * @property string $type An attribute group type.
 * @property bool $isShared Defines whether an attribute value is shared beetwen the entities or every entity has its own value.
Not applicable to advanced and advancedList types.

 * @property string $level An attribute group level, which defines an entity the group is valid for.
 * @property array $structure A structure, which describes advanced attribute values. Mandatory for advanced and advancedList types.
 * @property string[] $shopKeys A list of shop keys the attribute group is valid for.
 * @property bool $isOverridablePerShop Defines if shop specific attribute values are allowed for the given attribute group.
 * @property bool $isDifferentiating If an attribute group is differentiating, then every entity must have a unique attribute value.
This configuration is not applicable to advanced and advancedList types, neither to attribute groups marked as isShared=false.

 */
class AttributeGroup extends ApiObject
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
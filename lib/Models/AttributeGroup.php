<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the attribute group created by Backbone Core.
 * @property string $name A name, that uniquely identifies an attribute group.
 * @property string $frontendName An attribute group name, which will be display in the frontend.
 * @property string $type An attribute group type.
 * @property bool $isShared Defines whether an attribute value is shared beetwen the entities or every entity has its own value.
Not applicable to advanced and advancedList types.

 * @property string $group A classification name, which is used to cluster attribute groups.
 * @property string $level An attribute group level, which defines an entity the group is valid for.
 * @property array $structure A structure, which describes advanced attribute values. Mandatory for advanced and advancedList types.
 * @property int[] $shopIds A list of shop ids the attribute group is valid for.
 * @property bool $isOverridablePerShop If shopIds are set and isOverridablePerShop is true, then entity attributes can be overriden.
 * @property int $sort An attribute group sort position, mainly used in the frontend.
 * @property bool $isAttributeAddingAllowed 
 * @property bool $isDifferentiating If an attribute group is differentiating, then every entity must have a unique attribute value.
This configuration is not applicable to advanced and advancedList types, neither to attribute groups marked as isShared=false.

 * @property bool $isIndexable 
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
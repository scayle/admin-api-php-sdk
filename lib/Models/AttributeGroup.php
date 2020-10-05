<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the attribute group created by Backbone Core.
 * @property string $name A name, that uniquely idnetifies an attribute group.
 * @property string $frontendName An attribute group name, which will be display in the frontend.
 * @property string $type An attribute group type.
 * @property bool $isShared Defines whether an attribute value is shared beetwen the products or every product has its own value.
 * @property string $group A classification name, which is used to cluster attribute groups.
 * @property string $level An attribute group level, which defines an entity the group is valid for.
 * @property array $structure A structure for advanced attribute values. Mandatory for advanced and advancedList types.
 * @property int[] $shopIds A list of shop ids the attribute group is valid for.
 * @property bool $isOverridablePerShop 
 * @property int $sort 
 * @property bool $isAttributeAddingAllowed 
 * @property bool $isDifferentiating 
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
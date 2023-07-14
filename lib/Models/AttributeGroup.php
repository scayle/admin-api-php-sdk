<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the attribute group created by SCAYLE.
 * @property string $name A name that uniquely identifies an attribute group.
 * @property array $frontendName The localized attribute group name. At least the base language that is configured in SCAYLE is mandatory.
 * @property string $type An attribute group type.
 * @property bool $isShared Defines whether an attribute value is shared beetwen the entities or every entity has its own value.
 * It is not possible to share attributes of advanced type, therefore isShared must be always false in this case.
 * @property string $level An attribute group level, which defines an entity the group is valid for.
 * @property array $structure A structure, which describes advanced attribute values.
 * Mandatory for the advanced type.
 * @property AttributeGroupShopCountry[] $shopCountries A list of shop countries the attribute group is valid for.
 * The attribute group is valid for all shop countries if the field is omitted.
 * @property bool $isOverridablePerShop Defines if shop-specific attribute values are allowed for the given attribute group.
 * @property bool $isDifferentiating If an attribute group is differentiating, then every entity must have a unique attribute value.
 * This configuration is not applicable to the advanced type, neither to attribute groups marked as isShared=false.
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

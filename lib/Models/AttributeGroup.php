<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the attribute group created by SCAYLE.
 * @property string $name A name that uniquely identifies an attribute group.
 * Please ensure the input is URL-encoded, avoid using special characters like `%`, `&`, `#` directly.
 * @property array<string> $frontendName The localized attribute group name. It must include at least the default language that is configured in SCAYLE.
 * @property string $type The attribute type of the attribute group.
 * @property string $cluster The attribute group type.
 * @property bool $isShared Specifies whether an attribute value is shared among multiple entities or if each entity has its own unique value.
 * It's important to note that attributes of advanced types cannot be shared, so 'isShared' must always be set to false in such cases.
 * @property string $simpleValueType Value type. It can only be set for non-shared simple attribute groups and defaults to 'text' if not specified.
 * @property array<mixed>|array<mixed> $simpleValueTypeConfig
 * @property string $level Defines the attribute group level, specifying the type of entity it is applicable to.
 * @property array<mixed> $structure A structure, which describes advanced attribute values.
 * Mandatory for the advanced type.
 * @property AttributeGroupShopCountry[] $shopCountries A list of shop countries the attribute group is valid for.
 * The attribute group is valid for all shop countries if the field is omitted.
 * @property bool $isOverridablePerShop Defines if shop-specific attribute values are allowed for the given attribute group.
 * @property bool $isDifferentiating If an attribute group is differentiating, then every entity must have a unique attribute value.
 * This configuration is not applicable to the advanced type, neither to attribute groups marked as isShared=false.
 * @property string $group It is used for grouping the display of attribute groups in the Panel.
 */
class AttributeGroup extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}

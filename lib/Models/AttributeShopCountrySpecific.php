<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $shopKey A key that uniquely identifies the shop within the tenant's ecosystem.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property mixed $value The attribute value where the datatype is defined by the type property.
 * @property bool $isLocked Specifies if the attribute was locked via SCAYLE Panel.
 */
class AttributeShopCountrySpecific extends ApiObject
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

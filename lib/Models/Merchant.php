<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the merchant created by SCAYLE.
 * @property string $referenceKey Reference key of the merchant.
 * @property string $name Name of the merchant.
 * @property int $priority Priority of the merchant.
 */
class Merchant extends ApiObject
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

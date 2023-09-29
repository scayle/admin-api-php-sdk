<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the merchant created by SCAYLE.
 * @property string $referenceKey Reference key of the merchant.
 * @property string $name Name of the merchant.
 * @property int $priority Priority of the merchant.
 * @property MerchantContact[] $contacts A list of merchant contacts.
 * @property MerchantReturnAddress[] $returnAddresses A list of merchant return addresses.
 * @property MerchantCarrier[] $carriers A list of carriers attached to the merchant.
 */
class Merchant extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'contacts' => \AboutYou\Cloud\AdminApi\Models\MerchantContact::class,
        'returnAddresses' => \AboutYou\Cloud\AdminApi\Models\MerchantReturnAddress::class,
        'carriers' => \AboutYou\Cloud\AdminApi\Models\MerchantCarrier::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

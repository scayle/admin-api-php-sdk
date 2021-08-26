<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $referenceKey External reference set by the client to integrate third party systems.
 * @property string $street
 * @property string $houseNumber
 * @property string $additional Additional data pertaining to the address, such as `c/o AboutYou`.
 * @property string $zipCode
 * @property string $city
 * @property string $countryCode
 * @property CustomerAddressCollectionPoint $collectionPoint
 * @property CustomerAddressDefault $isDefault
 * @property CustomerAddressRecipient $recipient
 */
class CustomerAddress extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'collectionPoint' => \AboutYou\Cloud\AdminApi\Models\CustomerAddressCollectionPoint::class,
        'isDefault' => \AboutYou\Cloud\AdminApi\Models\CustomerAddressDefault::class,
        'recipient' => \AboutYou\Cloud\AdminApi\Models\CustomerAddressRecipient::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

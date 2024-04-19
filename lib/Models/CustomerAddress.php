<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $referenceKey External reference set by the client to integrate third party systems.
 * @property string $street Street is the mandatory string value in recepient's address
 * @property string $houseNumber House number of the recepient address
 * @property string $additional Additional data pertaining to the address
 * @property string $zipCode Zip code is a postal code of recepients location. Its a madatory value
 * @property string $city City of the recipient. It is a mandatory value
 * @property string $countryCode ISO 3166-1 alpha-3 country code
 * @property CustomerAddressCollectionPoint $collectionPoint Details of the point where the parcel is received (if used)
 * @property CustomerAddressDefault $isDefault Defines whether the address is the default billing and shipping address
 * @property CustomerAddressRecipient $recipient Recipient personal details
 */
class CustomerAddress extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'collectionPoint' => CustomerAddressCollectionPoint::class,
        'isDefault' => CustomerAddressDefault::class,
        'recipient' => CustomerAddressRecipient::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

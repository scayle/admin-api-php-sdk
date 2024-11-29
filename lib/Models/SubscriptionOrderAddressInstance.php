<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $additional
 * @property string $city
 * @property string $countryCode
 * @property string $firstName
 * @property bool $forwardToCollectionPoint
 * @property string $gender Gender of the customer mentioned as per defined ENUM as "m" , "f", "d", "n"
 * @property string $houseNumber
 * @property string $lastName
 * @property string $phone
 * @property string $state
 * @property string $street
 * @property string $title
 * @property string $zipCode
 * @property SubscriptionOrderAddressInstanceParcelShop $parcelShop
 */
class SubscriptionOrderAddressInstance extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'parcelShop' => SubscriptionOrderAddressInstanceParcelShop::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

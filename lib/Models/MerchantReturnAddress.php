<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the return address created by SCAYLE.
 * @property string $name The name of the return address.
 * @property string $street The street name of the return address.
 * @property string $streetNo The street number of the return address.
 * @property string $zipCode The postal code of the return address.
 * @property string $city The city name of the return address.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $dhlCode The DHL code of the return address.
 */
class MerchantReturnAddress extends ApiObject
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

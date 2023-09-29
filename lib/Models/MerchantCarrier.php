<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property Carrier $carrier
 */
class MerchantCarrier extends ApiObject
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

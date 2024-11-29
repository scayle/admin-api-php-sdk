<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $firstName
 * @property string $lastName
 * @property string $gender Gender of the customer mentioned as per defined ENUM as "m" , "f", "d", "n"
 * @property string $title
 * @property string $type
 */
class CustomerAddressRecipient extends ApiObject
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

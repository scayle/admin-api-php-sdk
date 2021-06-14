<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $referenceKey External reference set by the client to integrate a 3rd party system
 * @property string $firstName
 * @property string $lastName
 * @property string $gender
 * @property string $birthDate
 * @property string $email
 * @property string $phone
 * @property string $publicKey Public reference set by the client to display to customers in account areas and transactional emails
 * @property string $title
 * @property string $type
 * @property string[] $groups
 * @property CustomerStatus $status
 * @property CustomerAddress[] $addresses
 * @property array $legacyCustomData
 */
class Customer extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'status' => \AboutYou\Cloud\AdminApi\Models\CustomerStatus::class,
    ];

    protected $collectionClassMap = [
        'addresses' => \AboutYou\Cloud\AdminApi\Models\CustomerAddress::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

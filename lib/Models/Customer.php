<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the customer
 * @property string $referenceKey External reference set by the client to integrate a third party system.
 * @property string $firstName First name of the customer
 * @property string $lastName Last name of the customer
 * @property string $gender Gender of the customer mentioned as per defined ENUM as "m" , "f", "d"
 * @property string $birthDate Date of birth of the customer in YYYY-MM-DD format
 * @property string $email email address of the customer
 * @property string $phone phone number of the customer
 * @property string $publicKey Public reference set by the client to display to customers in account areas and transactional emails.
 * @property string $title User defined title. It can be set to NULL otherwise
 * @property string $type Type of customer (like personal)
 * @property string[] $groups Group to which the customer belongs to
 * @property CustomerStatus $status Defines if customer isActive or not and if customer isGuestCustomer or not
 * @property Company $company Company to which the customer belongs to
 * @property CustomerAddress[] $addresses Customers address (es)
 * @property mixed $legacyCustomData Custom data added to the customers (legacy feature)
 * @property string $createdAt Timestamp when the customer is created
 * @property string $updatedAt Timestamp when the customer is updated
 */
class Customer extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'status' => CustomerStatus::class,
    ];

    protected $collectionClassMap = [
        'addresses' => CustomerAddress::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

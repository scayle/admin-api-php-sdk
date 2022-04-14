<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property bool $isActive Declares whether the customer account is active or not
 * @property bool $isGuestCustomer Declares if the customer have an account or not
 */
class CustomerStatus extends ApiObject
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

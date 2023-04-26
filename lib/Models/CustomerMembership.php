<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property bool $isActive Membership state.
 * @property string $typeKey Membership type key.
 * @property string $accountNumber Membership account number.
 * @property string $createdAt Timestamp when the membership is created.
 * @property string $updatedAt Timestamp when the membership is updated.
 */
class CustomerMembership extends ApiObject
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

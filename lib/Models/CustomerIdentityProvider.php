<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $identityProviderCode The code of an Identity Provider
 * @property string $externalUserId User ID from the external Identity Provider
 */
class CustomerIdentityProvider extends ApiObject
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

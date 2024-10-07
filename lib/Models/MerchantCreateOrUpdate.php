<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the merchant created by SCAYLE.
 * @property string $referenceKey Reference key of the merchant.
 * @property string $name Name of the merchant.
 * @property int $priority Priority of the merchant.
 * @property string $orderDelegationUrl URL to send order delegation requests to the merchants.
 * @property string $cancellationUrl URL to send order cancellation requests.
 */
class MerchantCreateOrUpdate extends ApiObject
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

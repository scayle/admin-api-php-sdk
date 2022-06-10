<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $cardNumber The loyalty card number
 * @property int $points The number of points received for the purchase
 * @property string $provider The provider of the loyalty card
 */
class OrderLoyaltyCard extends ApiObject
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

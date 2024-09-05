<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $authorizedValue
 * @property SubscriptionOrderPaymentTypeConfirmationData $confirmationData
 * @property string $primaryPaymentMerchantKey
 * @property string $transactionId
 * @property string $type
 */
class SubscriptionOrderPaymentType extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'confirmationData' => SubscriptionOrderPaymentTypeConfirmationData::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

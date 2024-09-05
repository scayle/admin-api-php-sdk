<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property float $amount
 * @property string $apiVersion
 * @property string $authorizationId
 * @property string $authorizedDate
 * @property string $chargePermissionId
 * @property string $checkoutId
 * @property string $creditCardBrand
 * @property string $descriptor
 * @property string $expirationDate
 * @property string $giftCardCode
 * @property string $giftCardPin
 * @property bool $isRegularCustomer
 * @property string $merchantAccount
 * @property string $orderId
 * @property string $orderNumber
 * @property string $payId
 * @property array $paymentMeans
 * @property string $paymentPurpose
 * @property string $paymentSubType
 * @property string $profileId
 * @property string $pspReference
 * @property int $serial
 * @property string $subscriptionPaymentReference
 * @property bool $success
 * @property string $transactionId
 * @property string $type
 * @property array $userData
 * @property string[] $XID
 */
class SubscriptionOrderPaymentTypeConfirmationData extends ApiObject
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

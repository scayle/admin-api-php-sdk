<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Models;

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
 * @property array<mixed> $paymentMeans
 * @property string $paymentPurpose
 * @property string $paymentSubType
 * @property string $profileId
 * @property string $pspReference
 * @property int $serial
 * @property string $subscriptionPaymentReference
 * @property bool $success
 * @property string $transactionId
 * @property string $type
 * @property array<mixed> $userData
 * @property string[] $XID
 */
class SubscriptionOrderPaymentTypeConfirmationData extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}

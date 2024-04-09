<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $amount
 * @property array $data
 * @property string $key
 * @property string $transactionKey
 * @property OrderPaymentInstallment[] $installment Details about installments, included as a listing of the values involved in the Installments transaction.
 * @property OrderPaymentOptions $options
 */
class OrderPayment extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'installment' => \AboutYou\Cloud\AdminApi\Models\OrderPaymentInstallment::class,
        'options' => \AboutYou\Cloud\AdminApi\Models\OrderPaymentOptions::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

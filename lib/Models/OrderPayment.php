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
        'installment' => OrderPaymentInstallment::class,
        'options' => OrderPaymentOptions::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

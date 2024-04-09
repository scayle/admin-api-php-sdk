<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $countOfInstallments Number of installments chosen by the Customer for the Order
 * @property bool $hasPaybreak If true, the Customer elected to have a delay in payment capture
 */
class OrderPaymentOptions extends ApiObject
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

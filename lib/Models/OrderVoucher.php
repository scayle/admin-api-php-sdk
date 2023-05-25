<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property int $voucherId
 * @property OrderVoucherItem[] $applicableItems
 * @property string $code
 * @property string $type
 * @property int $value
 */
class OrderVoucher extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'applicableItems' => \AboutYou\Cloud\AdminApi\Models\OrderVoucherItem::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

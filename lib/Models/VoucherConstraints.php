<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property VoucherConstraintsDate $date
 * @property bool $isValidOnCampaigns
 * @property VoucherConstraintsApplications $maxApplications
 * @property VoucherConstraintsOrder $orderValue
 */
class VoucherConstraints extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'date' => VoucherConstraintsDate::class,
        'maxApplications' => VoucherConstraintsApplications::class,
        'orderValue' => VoucherConstraintsOrder::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

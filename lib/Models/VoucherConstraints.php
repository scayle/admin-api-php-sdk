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
        'date' => \AboutYou\Cloud\AdminApi\Models\VoucherConstraintsDate::class,
        'maxApplications' => \AboutYou\Cloud\AdminApi\Models\VoucherConstraintsApplications::class,
        'orderValue' => \AboutYou\Cloud\AdminApi\Models\VoucherConstraintsOrder::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $count Promotion code usage limit count
 * @property string $type Promotion code usage limit count type.
 * May be one of the following values:
 * order
 * customer
 *
 * Order - if different customers use the same code, it counts toward the total limit.
 * Customer - if different customers use the same code, each customer has their own limit count'
 */
class PromotionUsageLimitPromotionCode extends ApiObject
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

<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $type Depicts if the discount should be % of item cost or absolute amount that can be reduced from the item cost.
 * @property float $value Integer value that depicts relative (percentage) or absolute amount - currency is considered from the shop settings.
 */
class PromotionEffectAutomaticDiscount extends ApiObject
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

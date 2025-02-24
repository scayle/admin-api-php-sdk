<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $type Type of the promotion
 * @property PromotionEffectAutomaticDiscount|PromotionEffectBuyXGetY|PromotionEffectComboDeal $additionalData Additional data of the promotion effect, maxCountType and eligibleItemsQuantity are optional
 */
class PromotionEffect extends ApiObject
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

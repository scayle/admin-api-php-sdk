<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id Autogenerated tier id
 * @property string $name
 * @property PromotionTierEffectV1 $effect The tier effect overwrites the original Promotion effect, if tier conditions are met
 * @property int $mov Minimal order value requirement for a tier. Value should be in a fractional currency (e.g. cents), if a currency has fractions
 */
class PromotionTierV1 extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'effect' => PromotionTierEffectV1::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

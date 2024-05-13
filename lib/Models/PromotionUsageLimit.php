<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property PromotionUsageLimitPromotion $promotion
 * @property PromotionUsageLimitPromotionCode $promotionCodes
 */
class PromotionUsageLimit extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'promotion' => PromotionUsageLimitPromotion::class,
        'promotionCodes' => PromotionUsageLimitPromotionCode::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

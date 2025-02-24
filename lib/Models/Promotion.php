<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $id Promotion id
 * @property string $version Promotion version
 * @property string $name Name of the promotion
 * @property array $displayName Display name localisation
 * @property string $status The status of the promotion
 * @property string $activationType Promotion activation type
 * @property string $level Promotion application level
 * @property PromotionSchedule $schedule Time range when the promotion is active
 * @property int[] $companyIds The list of company ids where the promotion takes place
 * @property PromotionShopCountryId $shopCountryIds The list of shop country ids where the promotion takes place
 * @property PromotionSiblingPromotion $siblingPromotions Sibling promotions allow/block other promotions from being used together with this one
 * @property PromotionAudience $audiences Audiences allow/block list. Use it to restrict promotions to specific customer groups
 * @property PromotionEffect $effect The effect that will be applied if all conditions are satisfied
 * @property PromotionCondition[] $conditions The list of conditions ('payload.*') that determines whether the promotion is applicable or not
 * @property string[] $itemSetIds The list of itemSet IDs that can be applied into the promotion
 * @property int $priority Priority of the promotion
 * @property array $customData Additional data of the promotion. Can be legal text or some other info, that will be shown to customer
 * @property PromotionTier[] $tiers The list of promotion tiers. Tiers must be sent in ascending order
 * @property PromotionUsageLimit $usageLimit
 */
class Promotion extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'schedule' => PromotionSchedule::class,
        'siblingPromotions' => PromotionSiblingPromotion::class,
        'audiences' => PromotionAudience::class,
        'effect' => PromotionEffect::class,
        'usageLimit' => PromotionUsageLimit::class,
    ];

    protected $collectionClassMap = [
        'conditions' => PromotionCondition::class,
        'tiers' => PromotionTier::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

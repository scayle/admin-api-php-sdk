<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $id Promotion id
 * @property string $version Promotion version
 * @property string $name Name of the promotion
 * @property PromotionSchedule $schedule Time range when the promotion is active
 * @property bool $isActive Promotion active flag
 * @property string[] $shopId The list of shop ids where the promotion takes place
 * @property string[] $companyId The list of company ids where the promotion takes place
 * @property PromotionSiblingPromotions $siblingPromotions Sibling promotions allow/block other promotions from being used together with this one
 * @property PromotionAudiences $audiences Audiences allow/block list. Use it to restrict promotions to specific customer groups
 * @property PromotionEffect $effect The effect that will be applied if all conditions are satisfied
 * @property PromotionGlobalCondition[] $globalConditions The list of conditions ('payload.*') that determines whether the promotion is applicable or not
 * @property PromotionItemCondition[] $itemConditions The list conditions ('item.*') that determine whether promotion is applicable or not for a particular item
 * @property string $priority Priority of the promotion
 * @property array $additionalData Additional data of the promotion. Can be legal text or some other info, that will be shown to customer
 * @property PromotionTier[] $tiers The list of promotion tiers. Tiers must be sent in ascending order
 */
class Promotion extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'schedule' => \AboutYou\Cloud\AdminApi\Models\PromotionSchedule::class,
        'siblingPromotions' => \AboutYou\Cloud\AdminApi\Models\PromotionSiblingPromotions::class,
        'audiences' => \AboutYou\Cloud\AdminApi\Models\PromotionAudiences::class,
        'effect' => \AboutYou\Cloud\AdminApi\Models\PromotionEffect::class,
    ];

    protected $collectionClassMap = [
        'globalConditions' => \AboutYou\Cloud\AdminApi\Models\PromotionGlobalCondition::class,
        'itemConditions' => \AboutYou\Cloud\AdminApi\Models\PromotionItemCondition::class,
        'tiers' => \AboutYou\Cloud\AdminApi\Models\PromotionTier::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

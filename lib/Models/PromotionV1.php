<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $id Promotion id
 * @property string $version Promotion version
 * @property string $name Name of the promotion
 * @property PromotionScheduleV1 $schedule Time range when the promotion is active
 * @property bool $isActive Promotion active flag
 * @property string[] $shopId The list of shop ids where the promotion takes place
 * @property string[] $companyId The list of company ids where the promotion takes place
 * @property PromotionSiblingPromotionsV1 $siblingPromotions Sibling promotions allow/block other promotions from being used together with this one
 * @property PromotionAudiencesV1 $audiences Audiences allow/block list. Use it to restrict promotions to specific customer groups
 * @property PromotionEffectV1 $effect The effect that will be applied if all conditions are satisfied
 * @property PromotionGlobalConditionV1[] $globalConditions The list of conditions ('payload.*') that determines whether the promotion is applicable or not
 * @property PromotionItemConditionV1[] $itemConditions The list conditions ('item.*') that determine whether promotion is applicable or not for a particular item
 * @property string $priority Priority of the promotion
 * @property array $additionalData Additional data of the promotion. Can be legal text or some other info, that will be shown to customer
 * @property PromotionTierV1[] $tiers The list of promotion tiers. Tiers must be sent in ascending order
 */
class PromotionV1 extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'schedule' => PromotionScheduleV1::class,
        'siblingPromotions' => PromotionSiblingPromotionsV1::class,
        'audiences' => PromotionAudiencesV1::class,
        'effect' => PromotionEffectV1::class,
    ];

    protected $collectionClassMap = [
        'globalConditions' => PromotionGlobalConditionV1::class,
        'itemConditions' => PromotionItemConditionV1::class,
        'tiers' => PromotionTierV1::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}

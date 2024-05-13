<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int[] $variantIds Depicts what items can be given away for free when the promotion conditions match.
 * @property int $maxCount Depicts maximum no of items that can be given for free as part of this promotion
 * @property string $maxCountType Has to be configured together with `eligibleItemsQuantity`. String, available values:
 * omit for empty
 * `per_eligible_unique_items`: by default it will be `per_eligible_unique_items` - means, that calculating of limit amount free items will count only unique items, but not quantity of each unique item in basket. `eff.MaxCount * eff.ValidItems`
 * `per_eligible_items_quantity`: - means, that calculating of limit free items will count quantity of each item in basket that fit condition. `int64(math.Modf(float64(eff.ValidItemsQuantity) / float64(eff.EligibleItemsQuantity))) * eff.MaxCount`
 * @property int $eligibleItemsQuantity Has to be configured with `maxCountType=per_eligible_items_quantity`. Used for calculating of limit free items, check formula above.
 */
class PromotionEffectBuyXGetY extends ApiObject
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

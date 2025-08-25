<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property int[] $variantIds Depicts what items can be given away for free when the promotion conditions match.
 * @property int $maxCount Depicts maximum no of items that can be given for free as part of this promotion
 * @property string $maxCountType Has to be configured together with `eligibleItemsQuantity`. String, available values:
 * omit for empty
 * `per_eligible_unique_items`: Requires a total `eligibleItemsQuantity` of unique eligible items. Quantity is summed across all item sets if multiple are used.
 * `per_eligible_items_quantity`: Requires a total `eligibleItemsQuantity` of eligible items. Quantity is summed across all item sets if multiple are used.
 * `per_item_set`: Requires `eligibleItemsQuantity` of eligible items from each item set. Not applicable if the item_sets list is empty.
 * `single_item`: Requires `eligibleItemsQuantity` of any single eligible item.
 * @property int $eligibleItemsQuantity Has to be configured with `maxCountType=per_eligible_items_quantity`. Used for calculating of limit free items, check formula above.
 * @property string $discountType Depicts if the discount should be % of item cost or absolute amount that can be reduced from the item cost.
 * @property float $discountValue Integer value that depicts relative (percentage) or absolute amount - currency is considered from the shop settings.
 * @property string $discountDistribution - **none**: Applies the promotion reduction only to unit items specified in `promotionGroups.*.applicableUnitItemIds`. Items in `promotionGroups.*.eligibleUnitItemIds` receive a reduction of 0.
 * - **pro_rata**: Distributes the promotion reduction proportionally among all `promotionGroups` and unit items within them.
 * @property string $applicableItemSelectionType Allows different `y` item selection strategies:
 * `variant_ids`: The `y` item is selected from the provided `additionalData.variantIds` list. This type allows to support already existing promotions.
 * `cheapest`:
 * `x` item - the most expensive item from eligible items is selected
 * `y` item - the cheapest item from eligible items is selected
 * `most_expensive`:
 * `x` item - the first most expensive item from eligible items is selected
 * `y` item - the second most expensive item from eligible items is selected
 */
class PromotionEffectBuyXGetY extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}

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
 * @property int $price
 * @property string $maxCountType Has to be configured together with `eligibleItemsQuantity`. String, available values:
 * `per_eligible_items_quantity`: a customer needs to have a total `eligible_items_quantity` amount of items in the basket.
 * `per_item_set`: a customer needs to have a certain amount of items from item sets. The amount of items from each set can be configured in `additional_data.item_sets_configuration`. It can't be used if `itemSets` list is empty.
 * `single_item`: a customer needs to have an `eligibleItemsQuantity` amount of any single item
 * @property int $eligibleItemsQuantity How many eligible items a customer needs to have in the basket to fulfill the promotion condition.
 */
class PromotionEffectComboDeal extends ApiObject
{
    /** @var array<string, string> */
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
